<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessUnit;
use App\Models\FunctionalArea;
use Illuminate\Http\Request;

class FunctionalAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $functionalAreas =  FunctionalArea::all();
 
       return view('admin.functional-areas.index')->with(compact('functionalAreas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $businessUnits =  BusinessUnit::all();
 
        return view('admin.functional-areas.create')->with(compact('businessUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->business_unit_id);
        //
      $request->validate([
            'name'=>'required|max:255',
            'description'=>'required',
            'business_unit_id'=>'required'

        ]);
        $functionalArea = new FunctionalArea;
        $functionalArea->name = $request->input('name');
        $functionalArea->description = $request->input('description');
        $functionalArea->business_unit_id = $request->input('business_unit_id');        
        $functionalArea->save();
     
      

      $request->session()->flash('success', 'You have successfully created the Functional Area ');
      return redirect(route('admin.functional-areas.index'));
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
       
        $functionalArea = FunctionalArea::find($id);
        $businessUnits = BusinessUnit::all();
        return view('admin.functional-areas.edit')->with(compact('functionalArea', 'businessUnits'));
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
            'description'=>'required|max:255',
            'business_unit_id'=>'required'

        ]);
        //
        $functionalArea =FunctionalArea::find($id);
        if(!$functionalArea){
            $request->session()->flash('error', 'You cannot  edit this Functional Area');
            return redirect(route('admin.functional-areas.index'));
        }
        $functionalArea->name = $request->input('name');
        $functionalArea->description = $request->input('description');
        $functionalArea->business_unit_id = $request->input('business_unit_id');        
        $functionalArea->update();    
        


        $request->session()->flash('success', 'You have successfully edited the Functional Area Unit');
        return redirect(route('admin.functional-areas.index'));
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
        $functionalArea  =  FunctionalArea::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the the functional area');
        return back();
    }
}
