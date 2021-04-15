<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Process;
use Illuminate\Http\Request;
use App\Models\FunctionalArea;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $processes =  Process::all();
        return view('admin.processes.index')->with(compact( 'processes'));
       // dd($processes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $functionalAreas =  FunctionalArea::all();
        $statuses =  Status::all();
 
        return view('admin.processes.create')->with(compact('functionalAreas','statuses'));
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
        
       // dd($request->business_unit_id);
        //
      $request->validate([
        'name'=>'required|max:255',
        'description'=>'required',
        'functional_area_id'=>'required',
        'problem'=>'required',
        'solution'=>'required',
        'benefit_description'=>'required',
        'status'=>'required'
       

    ]);

    $fileName = time().'.'.$request->file->extension();  
   
    $request->file->move(public_path('process-maps'), $fileName);


    $process = new Process;
    $process->name = $request->input('name');
    $process->description = $request->input('description');
    $process->functional_area_id = $request->input('functional_area_id');      
    $process->problem = $request->input('problem');      
    $process->solution = $request->input('solution');      
    $process->benefit_description = $request->input('benefit_description');      
    $process->status = $request->input('status'); 
    $process->user_id  = Auth::user()->id;
    $process->image_url =$fileName; 
       
    $process->save();

    $request->session()->flash('success', 'You have successfully created the Process');
    return redirect(route('admin.processes.index'));


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
        $process = Process::find($id);
        $statuses = Status::all();
        $functionalAreas = FunctionalArea::all();
        return view('admin.processes.edit')->with(compact('process', 'statuses','functionalAreas'));
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
            'description'=>'required',
            'functional_area_id'=>'required',
            'problem'=>'required',
            'solution'=>'required',
            'benefit_description'=>'required',
            'status'=>'required'
         
   
           
    
        ]);
 
     
        
  
     
   

        $process =Process::find($id);
        if(!$process){
            $request->session()->flash('error', 'You cannot  edit this Process');
            return redirect(route('admin.processes.index'));
        }
   
        $process->name = $request->input('name');
        $process->description = $request->input('description');
        $process->functional_area_id = $request->input('functional_area_id');      
        $process->problem = $request->input('problem');      
        $process->solution = $request->input('solution');      
        $process->benefit_description = $request->input('benefit_description');      
        $process->status = $request->input('status'); 
        $process->user_id  = Auth::user()->id;
        $process->priority =$request->input('priority'); 
     
        if($request->hasFile('file')){
       
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('process-maps'), $fileName);
        

        $process->image_url =$fileName; 
         }
   
           
        $process->save();
    
        $request->session()->flash('success', 'You have successfully edited the Process');
        return redirect(route('admin.processes.index'));
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

        $process  =  Process::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the the Process');
        return back();
    }
}
