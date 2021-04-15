@extends('layouts.main')
@section('content')
<br>
<div class="row">
<div class="col-12">
    <h1 style="float: left; margin:5px;">Statuses</h1>
 
    <a style="float: right; margin:5px;" class="btn btn-sm btn-success" href="{{ route('admin.statuses.create') }}" role="button">+Add</a>
   
</div>

</div>
<div class="card">
<table id="dt" class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Name</th>          
            <th scope="col">Actions</th>
        </tr>
    </thead>
 <tbody>
     @foreach ($statuses as $status )
     <tr>
        <td scope="row">{{$status->id }}</td>
        <td>{{$status->name }}</td>
      
        <td>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.statuses.edit',$status->id) }}" role="button">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
         onclick="event.preventDefault();
         if (confirm('Are you sure you want to delete  this record from the system? Click  OK to  confirm or  cancel if you want to cancel delete  action.  to , NB This  is  not reversable.')) {
  // Save it!
  document.getElementById('delete-form-{{$status->id}}').submit()
} else {
  // Do nothing!
  console.log('Record Not deleted');
}"> 
        Delete
    </button>
        <form id ="delete-form-{{ $status->id }}" action="{{ route('admin.statuses.destroy',$status->id) }}" method="POST" style="display:none;">
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