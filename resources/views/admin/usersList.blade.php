@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Users List
	                <div class="btn-group pull-right">
	                	<a href="admin/create" class="btn btn-primary">Create</a>
	                </div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                    <thead>
                    	<tr>
                    		<th>#</th>
                    		<th>First Name</th>
                    		<th>Email</th>
                    		<th>Status</th>
                    		<th>Register</th>
                    		<th>Actions</th>
                    	</tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
					  <tr>
                      <th scope="row">{{ $user->id }}</th>
                       <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->status == 100) Admin @else User @endif</td>
                         <td>{{ $user->created_at }}</td>
                         <td>
	                         <div class="btn-group">
                         	 <a href="/admin/update/{{ $user->id }}" class="btn btn-warning">Update</a>
                         	 <a href="/admin/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
	                         </div>
                         </td>
                     </tr>
					@endforeach
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
