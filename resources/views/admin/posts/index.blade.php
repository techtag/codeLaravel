@extends('layouts.admin')
@section('content')
	@if(Session::has('post_form_message'))
		<p class='bg-danger'>{{session('post_form_message')}}</p>
	@endif
	<h1>Posts</h1>
	<table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Photo</th>
	        <th>Owner</th>
	        <th>Category</th>	        
	        <th>Title</th>
	        <th>Body</th>
	        <th>Created</th>
	        <th>Updated</th>
	      </tr>
	    </thead>
	    <tbody>
	    @if($posts)
	    	@foreach($posts as $post)	    	
	      <tr>
	        <td>{{$post->id}}</td>
	        <td><img src="{{$post->photo?$post->photo->file:'http://placehold.it/400x400'}}" class="img-responsive img-rounded" height='50px' width="50px"></td>
	        <td>{{$post->user->name}}</td>
	        <td>{{$post->category->name}}</td>	        
	        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>	        
	        <td>{{$post->body}}</td>	        
	        <td>{{$post->created_at->diffForHumans()}}</td>
	        <td>{{$post->updated_at->diffForHumans()}}</td>
	      </tr>
	      	@endforeach	   
	     @endif   
	    </tbody>
	  </table>
@stop