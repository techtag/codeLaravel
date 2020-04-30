@extends('layouts.admin')
@section('styles')
	<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/basic.min.css'></link>
@stop
@section('content')
	<h1>Upload Media</h1>
	{!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}		
	{!! Form::close() !!}
@stop
@section('scripts')
	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone-amd-module.min.js'></script>
@stop
