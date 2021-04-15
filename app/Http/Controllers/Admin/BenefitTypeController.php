<?php

namespace App\Http\Controllers\Admin;

use App\Models\BenefitType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $benefitTypes =   BenefitType::all();
        return view('admin.benefit-types.index')->with(compact('benefitTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.benefit-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255'

        ]);
        // if  validation  
       $benefitType = BenefitType::create($request->except(['_token', 'roles']));
      //  $user->roles()->sync($request->roles);
      

      $request->session()->flash('success', 'You have successfully created the Benefit Type');
      return redirect(route('admin.benefit-types.index'));
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
        $benefitType = BenefitType::find($id);
        return view('admin.benefit-types.edit')->with(compact( 'benefitType'));
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
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255'

        ]);
        //
        $benefitType = BenefitType::find($id);
        if(!$benefitType){
            $request->session()->flash('error', 'You cannot  edit this Benefit Type');
            return redirect(route('admin.benefit-types.index'));
        }
        $benefitType->update($request->except(['_token']));
         $request->session()->flash('success', 'You have successfully edited the Benefit Type');
        return redirect(route('admin.benefit-types.index'));
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
        $benefitType  =  BenefitType::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the Benefit Type');
        return back();
    }
}
