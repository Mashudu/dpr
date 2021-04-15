@extends('layouts.main')
@section('content')
<br>
<div class="row">
<div class="col-12">
    <h1 style="float: left; margin:5px;">PROCESSES</h1>
 
    <a style="float: right; margin:5px;" class="btn btn-sm btn-success" href="{{ route('admin.processes.create') }}" role="button">+Add</a>
   
</div>

</div>
<div class="card">
<table id="dt" class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Name</th>            
            <th scope="col">Business Unit</th>
            <th scope="col">Functional Area</th>
            <th scope="col">Status</th>           
            <th scope="col">Updated</th>            
            <th  scope="col">Actions</th>
        </tr>
    </thead>
 <tbody>
     @foreach ($processes as $process)
     <tr>
        <td scope="row">{{$process->id }}</td>
        <td>{{$process->name }}</td>
        
        <td>{{$process->functionalArea->businessUnit->name }}</td>
        <td>{{$process->functionalArea->name }}</td>
        <td>{{$process->status}}</td>    
    
        <td>{{$process->updated_at }}</td>
        <td>
            <div class="btn-group">
        <a class="btn btn-sm btn-primary" href="{{ route('admin.processes.edit',$process->id) }}" role="button">Edit</a> 
      
        <button type="button" class="btn btn-sm btn-danger"
         onclick="event.preventDefault();
         if (confirm('Are you sure you want to delete  this record from the system? Click  OK to  confirm or  cancel if you want to cancel delete  action.  to , NB This  is  not reversable.')) {
  // Save it!
  document.getElementById('delete-form-{{$process->id}}').submit()
} else {
  // Do nothing!
  console.log('Record Not deleted');
}"> 
        Delete
    </button>
        <form id ="delete-form-{{ $process->id }}" action="{{ route('admin.processes.destroy',$process->id) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')

        </form>
            </div>
    </td>
    </tr>
     @endforeach
    
 </tbody>
</table>
</div>
@endsection