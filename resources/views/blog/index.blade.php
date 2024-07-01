@extends('main')

@section('title', "- Blogs")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">

            @foreach ($posts as $post)

                <div class="post mt-3">
                    <h2>{{ $post->title }}</h2>
                    <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
                    <p>{{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single' , $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>

            @endforeach

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection