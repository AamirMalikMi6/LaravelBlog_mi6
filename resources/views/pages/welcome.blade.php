@extends('main')

@section('title', '- Home')

@section('active', 'active')

@section('content')

    <div class="bg-body-tertiary p-5 mb-5 rounded">
        <h1>Welcome to my Blog</h1>
        <p class="lead">Thank You so much for visiting. This is my test website build with Laravel. Please read my
            popular post!</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Popular Post &raquo;</a></p>
    </div>
    <div class="row">
        <div class="col-md-8">

            @foreach ($posts as $post)
            
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}</p>
                    <a href="{{ 'blog/'.$post->slug }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>

            @endforeach

        </div>
        <div class="col-md-3 offset-md-1">
            <h2>Sidebar</h2>

        </div>
    </div>

@endsection