@extends('layouts.admin')
@section('content')
	<h1>Categories</h1>
	@if(Session::has('category_form_message'))
		<p class='bg-danger padding-y-sm'>{{session('category_form_message')}}</p>
		@endif
	<div class="col-sm-4">
		{!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
			<div class="form-group">
				{!! Form::label('name','Name') !!}
				{!! Form::text('name',null,['class'=>'form-control']) !!}
			</div>
			<div class="form-group">		
				{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
			</div>
		{!! Form::close() !!}		
	</div>
	<div class="col-sm-8">
		<table class="table">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Updated</th>
		      </tr>
		    </thead>
		    <tbody>
		    @if($categories)
		    	@foreach($categories as $category)
		      <tr>
		        <td>{{$category->id}}</td>
		        <td><a href='{{route('admin.categories.edit',$category->id)}}'>{{$category->name}}</a></td>
		        <td>{{$category->created_at?$category->created_at->diffForHumans():''}}</td>
		        <td>{{$category->updated_at?$category->updated_at->diffForHumans():''}}</td>
		      </tr>		    
		      	@endforeach
		    @endif  
		    </tbody>
		  </table>
	</div>	
@stop