@extends('layouts.main')
@section('content')
<br>
<div class="row">
<div class="col-12">
    <h1 style="float: left; margin:5px;">Users</h1>
 
    <a style="float: right; margin:5px;" class="btn btn-sm btn-success" href="{{ route('admin.users.create') }}" role="button">+Add</a>
   
</div>

</div>
<div class="card">
<table id="dtUsers" class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
 <tbody>
     @foreach ($users as $user )
     <tr>
        <td scope="row">{{$user->id }}</td>
        <td>{{$user->name }}</td>
        <td>{{$user->email }}</td>
        <td>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit',$user->id) }}" role="button">Edit</a>
        <button type="button" class="btn btn-sm btn-danger"
         onclick="event.preventDefault();
         if (confirm('Are you sure you want to delete  this user from the system? Click  OK to  confirm or  cancel if you want to cancel delete  action.  to , NB This  is  not reversable.')) {
  // Save it!
  document.getElementById('delete-user-form-{{$user->id}}').submit()
} else {
  // Do nothing!
  console.log('User Not deleted');
}"> 
        Delete
    </button>
        <form id ="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display:none;">
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