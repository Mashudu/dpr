<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuses =   Status::all();
        return view('admin.statuses.index')->with(compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.statuses.create');
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
            

        ]);
        // if  validation  
       $status = Status::create($request->except(['_token']));
       $request->session()->flash('success', 'You have successfully created the a Status');
       return redirect(route('admin.statuses.index'));
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
        $status = Status::find($id);
        return view('admin.statuses.edit')->with(compact( 'status'));
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
          

        ]);
        //
        $status = Status::find($id);
        if(!$status){
            $request->session()->flash('error', 'You cannot  edit this Status ');
            return redirect(route('admin.statuses.index'));
        }
        $status->update($request->except(['_token']));
         $request->session()->flash('success', 'You have successfully edited the Status');
        return redirect(route('admin.statuses.index'));
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
        $status  =  Status::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the Status');
        return back();
    }
}
