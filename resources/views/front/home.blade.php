@extends('layouts.blog-home')

@section('content')
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @if(count($posts)>0)
                    @foreach($posts as $post)
                        <!-- First Blog Post -->
                        <h2>
                            <a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">{{$post->user->name}}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                        <hr>
                        <img class="img-responsive" src="{{$post->photo?$post->photo->file:$post->photoPlaceholder()}}" alt="">
                        <hr>
                        <p>{!! str_limit($post->body,300) !!}</p>
                        <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @endif

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            {{-- Blog Side bar --}}
            @include('front.sidebar')

        </div>
        <!-- /.row -->
        <hr>
@endsection
