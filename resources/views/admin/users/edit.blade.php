@extends('layouts.admin')
@section('content')
	<h1>Edit User</h1>
	<div class="row">
	<div class="col-sm-3">
		<img src="{{$user->photo?$user->photo->file:'http://placehold.it/400x400'}}" class="img-responsive img-rounded" >
	</div>
	<div class="col-sm-9">
	{!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::email('email',null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('role_id','Role') !!}
			{!! Form::select('role_id',[''=>'Select Role'] + $roles , null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('is_active','Status') !!}
			{!! Form::select('is_active',array(0=>'Inactive',1=>'Active'),null,['class'=>'form-control']) !!}
		</div>				
		<div class="form-group">
			{!! Form::label('photo_id','Profile Picture') !!}
			{!! Form::file('photo_id',['class'=>'form-file']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('password','Password') !!}
			{!! Form::password('password',['class'=>'form-control']) !!}
		</div>
		<div class="form-group">		
			{!! Form::submit('Update User',null,['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}	
	@include('includes.form_error')
	</div>
	</div>
@stop