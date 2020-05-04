@extends('layouts.admin')
@section('content')
	@if(Session::has('post_form_message'))
		<p class='bg-danger padding-y-sm'>{{session('post_form_message')}}</p>
	@endif
	<h1>Posts</h1>
	<table class="table">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Photo</th>
	         <th>Title</th>
	        <th>Owner</th>
	        <th>Category</th>	 
	        <th>View</th>
	        <th>Comments</th>
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
	        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>	        
	        <td>{{$post->user->name}}</td>
	        <td>{{$post->category->name}}</td>	        	        	        
	        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
	        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
	        <td>{{$post->created_at->diffForHumans()}}</td>
	        <td>{{$post->updated_at->diffForHumans()}}</td>
	        {{-- <td>{{str_limit($post->body,20)}}</td>	     --}}    
	      </tr>
	      	@endforeach	   
	     @endif   
	    </tbody>
	  </table>
	  <div class="row">
	  	<div class="col-sm-6 col-sm-offset-5">
	  		{{$posts->render()}}
	  	</div>
	  </div>
@stop