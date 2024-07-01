@extends('main')

@section('title', '- View Post')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1 class="panel-title">{{ $post->title }}</h1>
        <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-md-4">
        <div class="well bg-light p-3 rounded-3 shadow-sm">
            <dl class="row">
                <dt class="col-sm-4">URL</dt>
                <dd class="col-sm-8"><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug)  }}</a></dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4">Created At:</dt>
                <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
            </dl>
            <dl class="row">
                <dt class="col-sm-4">Last Update:</dt>
                <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary w-100">Edit</a>
                </div>
                <div class="col-sm-6">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                    </form>
                </div>
            </div>
            <!-- See All Post button -->
            <div class="mt-3">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-dark w-100">&lt;&lt;See All Post</a>
            </div>
        </div>
    </div>
</div>

@endsection