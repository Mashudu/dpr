<?php

namespace App\Http\Controllers\Admin;

use App\Models\SquadMember;
use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $businessUnits =   BusinessUnit::all();
        return view('admin.business-units.index')->with(compact('businessUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.business-units.create');
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
       $user = BusinessUnit::create($request->except(['_token', 'roles']));
      //  $user->roles()->sync($request->roles);
      

      $request->session()->flash('success', 'You have successfully created the Business Unit');
      return redirect(route('admin.business-units.index'));
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
        $businessUnit = BusinessUnit::find($id);
        return view('admin.business-units.edit')->with(compact( 'businessUnit'));
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
        $businessUnit = BusinessUnit::find($id);
        if(!$businessUnit){
            $request->session()->flash('error', 'You cannot  edit this Business Unit');
            return redirect(route('admin.business-units.index'));
        }
        $businessUnit->update($request->except(['_token']));
         $request->session()->flash('success', 'You have successfully edited the Business Unit');
        return redirect(route('admin.business-units.index'));
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
        $businessUnit  =  businessUnit::destroy($id);
        $request->session()->flash('success', 'You have successfully deleted the user');
        return back();
    }

    public  function getBusinessUnitByIdFrontEnd($id)
    {
        $squadMembers = SquadMember::where('business_unit_id',$id)->orderBy('full_name')->get();

        $businessUnit = BusinessUnit::find($id);
        $processList = DB::select('SELECT a.*
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? ', [$id]);

$functionalAreas = DB::select('SELECT a.*
from functional_areas a

where a.business_unit_id=? ', [$id]);


        $priorityList = DB::select('SELECT a.*
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? order  by priority asc LIMIT 3', [$id]);

        $benefitsList = DB::select('SELECT u.unit_left,u.unit_right, u.benefit_type,sum(u.benefit_value) as  total_benefit_value from (select y.unit_left,y.unit_right,y.id as  benefit_type_id,y.name as benefit_type,COALESCE(x.value,0) as benefit_value from (select d.benefit_type_id,d.value,a.* from business_units a 
        join  functional_areas b  on  a.id= b.business_unit_id
        join  processes c  on  c.functional_area_id =  b.id
        join  benefits d  on  d.process_id = c.id
        left  join  benefit_types e  on  e.id =  d.benefit_type_id
        where  a.id= ?
        ) x  
        right outer join  benefit_types y  on x.benefit_type_id = y.id) u
        group by  u.benefit_type', [$id]);


        $totalProcesses = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=?', [$id]);

        $totalProcessesComplete = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? and a.status=?', [$id,'Complete']);

        $totalProcessesInProgress = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? and a.status=?', [$id,'In-Progress']);

        $totalProcessesInDev = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? and a.status=?', [$id,'In-Dev']);

        $totalProcessesToDo = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? and a.status=?', [$id,'To-Do']);

        $totalProcessesBacklog = DB::select('SELECT count(a.id) as number_of_processes
        from processes a
        inner  join functional_areas b  on b.id=a.functional_area_id
        inner join business_units c  on  c.id=b.business_unit_id
        where c.id=? and a.status=?', [$id,'Backlog']);

        if($totalProcesses[0]->number_of_processes > 0)
        {
            $percentageComeple =  ($totalProcessesComplete[0]->number_of_processes/$totalProcesses[0]->number_of_processes)*100;
        }
        else{
            $percentageComeple=0;
        }
      
        if($totalProcesses[0]->number_of_processes > 0)
        {
            $percentageInProgress =  ($totalProcessesInProgress[0]->number_of_processes/$totalProcesses[0]->number_of_processes)*100;
        }
        else{
            $percentageInProgress=0;
        }
       
        if($totalProcesses[0]->number_of_processes >0)
        {
            $percentageToDo =  ($totalProcessesToDo[0]->number_of_processes/$totalProcesses[0]->number_of_processes)*100;
        }
        else{
            $percentageToDo =0;
        }
            
        if($totalProcesses[0]->number_of_processes > 0)
        {
            $percentageBacklog =  ($totalProcessesBacklog[0]->number_of_processes/$totalProcesses[0]->number_of_processes)*100;
            
        }
        else{
            $percentageBacklog =0;
        }
          // dd($totalProcesses);

       
        return view('business-units.index')->with(compact('businessUnit',
                                                          'totalProcesses',
                                                          'totalProcessesComplete',
                                                          'totalProcessesInProgress',
                                                          'totalProcessesToDo',
                                                          'totalProcessesBacklog',
                                                          'percentageComeple',
                                                          'percentageInProgress',
                                                          'percentageToDo',
                                                          'percentageBacklog',
                                                          'processList',
                                                          'benefitsList',
                                                          'priorityList',
                                                          'squadMembers',
                                                          'functionalAreas'
                                                        ));
    }

    public  function getProcessesByFunctionalAreaSummary($id)
    {
   

        $totalProcesses = DB::select('SELECT b.name,count(a.id) as number_of_processes
        from processes a
        right outer  join functional_areas b  on b.id=a.functional_area_id
        right  outer join business_units c  on  c.id=b.business_unit_id
        where c.id=? group by b.name', [$id]);

      
        return json_encode($totalProcesses);
    }
}
