<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Gate::denies('logged-in')){
            dd('no access  allowed');
        }
        $users = User::all();
        return view('admin.users.index')->with(compact('users'));
         

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create')->with(compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        /*$validatedData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255|unique:users',
             'password'=>'required|min:8|max:255'

        ]);*/
        // if  validation  
       // $user = User::create($request->except(['_token', 'roles']));
      //  $user->roles()->sync($request->roles);
        $newUser = new CreateNewUser(); 
        $user = $newUser->create($request->only(['name','email','password','password_confirmation']));
        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only('email'));


        $request->session()->flash('success', 'You have successfully created the user');
        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.users.edit')->with(compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if(!$user){
            $request->session()->flash('error', 'You cannot  edit this user');
            return redirect(route('admin.users.index'));
        }
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', 'You have successfully edited the user');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        // dd($id);
        $user  =  User::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the user');
        return back();
    }
}
