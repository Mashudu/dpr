<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Glossary;
use Illuminate\Http\Request;

class GlossaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $glossaries =   Glossary::all();
        return view('admin.glossary.index')->with(compact('glossaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.glossary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'name'=>'required|max:255',
            'description'=>'required'

        ]);
        // if  validation  
       $glossary = Glossary::create($request->except(['_token']));
      //  $user->roles()->sync($request->roles);
      

      $request->session()->flash('success', 'You have successfully created the Glossary Term');
      return redirect(route('admin.glossary.index'));
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
        $glossary = Glossary::find($id);
        return view('admin.glossary.edit')->with(compact('glossary'));
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
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required'

        ]);
        //
        $glossary = Glossary::find($id);
        if(!$glossary){
            $request->session()->flash('error', 'You cannot  edit this Glossary term');
            return redirect(route('admin.glossary.index'));
        }
        $glossary->update($request->except(['_token']));
         $request->session()->flash('success', 'You have successfully edited the glossary term');
        return redirect(route('admin.glossary.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $glossary  =  Glossary::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the glossary term');
        return back();
    }
}
