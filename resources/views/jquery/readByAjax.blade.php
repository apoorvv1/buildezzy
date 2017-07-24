@extends('layouts.master')

@section('content')
    
<table class="table">
	<thead>
		<tr>
			
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>C.NO</th>
			<th>Email</th>
			<th>Address</th>
			<th>Action</th>
		
		</tr>
	</thead>
	<tbody>
		@foreach($learns as $key=>$l)
		<tr class="id{{$l->id}}">
			<td>{{$l->id}}</td>
			<td>{{$l->fname}}</td>
			<td>{{$l->lname}}</td>
			<td>{{$l->cno}}</td>
			<td>{{$l->email}}</td>
			<td>{{$l->address}}</td>
			<td><button value="{{$l->id}}" class="btn btn-primary btn-sm btn-edit">Edit</button></td>
<td><button value="{{$l->id}}" class="btn btn-danger btn-sm btn-dell">Delete</button></td>
		</tr>
		@endforeach
	</tbody>
</table>