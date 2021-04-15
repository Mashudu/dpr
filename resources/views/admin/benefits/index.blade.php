@extends('layouts.main')
@section('content')
<br>
<div class="row">
<div class="col-12">
    <h1 style="float: left; margin:5px;">BUSINESS BENEFITS</h1>
 
    <a style="float: right; margin:5px;" class="btn btn-sm btn-success" href="{{ route('admin.benefits.create') }}" role="button">+Add</a>
   
</div>

</div>
<div class="card">
<table id="dt" class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Process</th>
            <th scope="col">Business Unit</th>
            <th scope="col">Benefit Type</th>
            <th scope="col">Benefit Value</th>          
            <th scope="col">Actions</th>
        </tr>
    </thead>
 <tbody>
     @foreach ($benefits as $benefit )
     <tr>
        <td scope="row">{{$benefit->id }}</td>
        <td scope="row">{{$benefit->process->functionalArea->businessUnit->name }}</td>
        <td>{{$benefit->process->name }}</td>
        <td>{{$benefit->benefitType->name }}</td>
        <td>{{$benefit->value }}</td>
        <td>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.benefits.edit',$benefit->id) }}" role="button">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
         onclick="event.preventDefault();
         if (confirm('Are you sure you want to delete  this record from the system? Click  OK to  confirm or  cancel if you want to cancel delete  action.  to , NB This  is  not reversable.')) {
  // Save it!
  document.getElementById('delete-form-{{$benefit->id}}').submit()
} else {
  // Do nothing!
  console.log('Record Not deleted');
}"> 
        Delete
    </button>
        <form id ="delete-form-{{ $benefit->id }}" action="{{ route('admin.benefits.destroy',$benefit->id) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')

        </form>
    </td>
    </tr>
     @endforeach
    
 </tbody>
</table>
</div>
@endsection