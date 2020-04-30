@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
	by <a href="#">{{$post->user->name}}</a>
</p>

<hr>
<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{($post->photo)?$post->photo->file:'$post->photoPlaceholder()'}}" alt="">

<hr>
<!-- Post Content -->
<p class="lead">{!! $post->body !!}</p>

<hr>

@if(Auth::check())
<!-- Blog Comments -->
	<!-- Comments Form -->
	@if(Session::has('comment_message'))
		<p>{{session('comment_message')}}</p>
	@endif
		<div class="well">
			<h4>Leave a Comment:</h4>
			{!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
				<input type="hidden" name="post_id" value="{{$post->id}}">
				<div class="form-group">
					{{-- {!! Form::label('body','Body') !!} --}}
					{!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
				</div>
				<div class="form-group">		
					{!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
@endif
<hr>

<!-- Posted Comments -->
@if(count($comments)>0)
	@foreach($comments as $comment)
	<!-- Comment -->
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" height="64" width="64" src="{{$comment->photo}}" alt=""> {{-- {{Auth::user()->gravatar}}  --}}
		</a>
		<div class="media-body">
			<h4 class="media-heading">{{$comment->author}}
				<small>{{$comment->created_at->diffForHumans()}}</small>	                        
			</h4>
			{{$comment->body}}
			<div class="comment-reply-container">
				<button class="toggle-reply btn btn-primary pull-right">Reply</button>
					<div class="comment-reply col-sm-6">
					{!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
						<input type="hidden" name="comment_id" value="{{$comment->id}}">
						<div class="form-group">
							{!! Form::label('body','Body') !!}
							{!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
						</div>
						<div class="form-group">		
							{!! Form::submit('Submit Reply',['class'=>'btn btn-primary']) !!}
						</div>
					{!! Form::close() !!}
					</div>
			</div>
			@if(count($comment->replies)>0)
				@foreach($comment->replies as $reply)
				@if($reply->is_active==1)
					<div class="media nested-comment">
							<a class="pull-left" href="#">
								<img class="media-object" height="64" width="64" src="{{$reply->photo}}" alt="">
							</a>
							<div class="media-body">
								<h4 class="media-heading">{{$reply->author}}
									<small>{{$reply->created_at->diffForHumans()}}</small>
								</h4>
								{{$reply->body}}
							</div>
					</div>								
				@endif	
				@endforeach			
			@endif
		</div>
	</div>
	@endforeach
@endif

@stop

@section('sidebar')
<!-- Blog Search Well -->
<div class="well">
	<h4>Blog Search</h4>
	<div class="input-group">
		<input type="text" class="form-control">
		<span class="input-group-btn">
			<button class="btn btn-default" type="button">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
	<!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
	<h4>Blog Categories</h4>
	<div class="row">
		<div class="col-lg-6">
			<ul class="list-unstyled">
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
			</ul>
		</div>
		<div class="col-lg-6">
			<ul class="list-unstyled">
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
				<li><a href="#">Category Name</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
	<h4>Side Widget Well</h4>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>
@stop

@section('scripts')
	<script type="text/javascript">
		$('.toggle-reply').on('click',function(){
			$(this).next().slideToggle('slow');
		});
	</script>
@stop