<?php

namespace App\Http\Controllers\Admin;

use App\Models\SquadMember;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SquadMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        $squadMembers = DB::select('SELECT a.*,b.name as busines_unit_name
        from squad_members a
        inner  join business_units b  on b.id=a.business_unit_id');
       
        return view('admin.squad-members.index')->with(compact('squadMembers'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = [
            'Business Analyst',
            'Developer',
            'Process Engineer',
            'Scrum Master',
            'Architect',


        ];
        $businessUnits  = BusinessUnit::all();
        return view('admin.squad-members.create')->with(compact('roles','businessUnits'));
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
            'full_name'=>'required|max:255',
            'business_unit_id'=>'required',
            'role'=>'required',
            'email'=>'required'

        ]);
        // if  validation  
       $user = SquadMember::create($request->except(['_token']));
      //  $user->roles()->sync($request->roles);
      

      $request->session()->flash('success', 'You have successfully created squad  member');
      return redirect(route('admin.squad-members.index'));
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
        $roles = [
            'Business Analyst',
            'Developer',
            'Process Engineer',
            'Scrum Master',
            'Architect',


        ];
        $squadMember = SquadMember::find($id);
        $businessUnits  = BusinessUnit::all();
        return view('admin.squad-members.edit')->with(compact('roles','businessUnits','squadMember'));
  
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
            'full_name'=>'required|max:255',
            'business_unit_id'=>'required',
            'role'=>'required',
            'email'=>'required'

        ]);
        //
        $squadMember = SquadMember::find($id);
        if(!$squadMember){
            $request->session()->flash('error', 'You cannot  edit this squad  member');
            return redirect(route('admin.business-units.index'));
        }
        $squadMember->update($request->except(['_token']));
        $request->session()->flash('success', 'You have successfully edited squad  member');
        return redirect(route('admin.squad-members.index'));


       
       
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
        $squadMember  =  SquadMember::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the squad member');
        return back();
    }
}
