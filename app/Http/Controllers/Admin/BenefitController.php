<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BenefitType;
use App\Models\Process;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $benefits= Benefit::all();
    return view('admin.benefits.index')->with(compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $processes= Process::all();
        $benefitTypes= BenefitType::all();
        return view('admin.benefits.create')->with(compact('processes','benefitTypes'));
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
            'value'=>'required',
            'process_id'=>'required',
            'benefit_type_id'=>'required'

        ]);
        $benefit = new Benefit;
        $benefit->value = $request->input('value');
        $benefit->process_id = $request->input('process_id');
        $benefit->benefit_type_id = $request->input('benefit_type_id');
           
        $benefit->save();
     
      

      $request->session()->flash('success', 'You have successfully added a  benefit to this  process');
      return redirect(route('admin.benefits.index'));
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
        $benefit = Benefit::find($id);
        $processes = Process::all();
        $benefitTypes = BenefitType::all();
        return view('admin.benefits.edit')->with(compact('benefit', 'processes','benefitTypes'));
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
            'value'=>'required',
            'process_id'=>'required',
            'benefit_type_id'=>'required'

        ]);
       
        $benefit =Benefit::find($id);
        if(!$benefit){
            $request->session()->flash('error', 'You cannot  edit this Benefit Area');
            return redirect(route('admin.benefits.index'));
        }
        $benefit->value = $request->input('value');
        $benefit->process_id = $request->input('process_id');
        $benefit->benefit_type_id = $request->input('benefit_type_id');          
        $benefit->update();    
        


        $request->session()->flash('success', 'You have successfully edited the benefit');
        return redirect(route('admin.benefits.index'));
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
        $benefit  =  Benefit::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the the benefit');
        return back();
    }
}
