@extends('layouts.admin')
@section('content')
	<h1>Comments Replies</h1>		
	
	    @if(count($replies)>0)
	    	<table class="table">
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Author</th>
			        <th>Email</th>
			        <th>Body</th>
			        <th>Comment Post</th>
			        <th>Approve</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
		    	@foreach($replies as $reply)
		    		<tr>
			        <td>{{$reply->id}}</td>
			        <td>{{$reply->author}}</td>
			        <td>{{$reply->email}}</td>
			        <td>{{$reply->body}}</td>
			        <td><a href="{{route('admin.comments.show',$reply->comment_id)}}">View Comment</a></td>
			        <td>
			        	@if($reply->is_active==1)
			        		{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
			        			<input type="hidden" name="is_active" value="0">
			        			<div class="form-group">		
			        				{!! Form::submit('Unapprove',['class'=>'btn btn-danger']) !!}
			        			</div>
			        		{!! Form::close() !!}
			        	@else
			        		{!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
			        			<input type="hidden" name="is_active" value="1">
			        			<div class="form-group">		
			        				{!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
			        			</div>
			        		{!! Form::close() !!}	        	
			        	@endif
			        </td>
			        <td>
			        	{!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}	        		
			        		<div class="form-group">		
			        			{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
			        		</div>
			        	{!! Form::close() !!}</td>
			      </tr>
		    	@endforeach
		    	</tbody>
	  		</table>
	    @else
	    	<h1>No replies</h1>
	    @endif	      
	    
@stop