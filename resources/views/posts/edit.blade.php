@extends('main')

@section('title', '- Edit Post')

@section('content')

<div class="row">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8">
                <label for="title">Title</label>
                <input type="text" class="form-control form-control-lg" id="title" name="title"
                    value="{{ $post->title }}">

                <label class="" for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">

                <label class="mt-3" for="body">Body</label>
                <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
            </div>
            <div class="col-md-4">
                <div class="well bg-light p-3 rounded-3 shadow-sm">
                    <dl class="row">
                        <dt class="col-sm-4">URL</dt>
                        <dd class="col-sm-8"><a href="{{ route('blog.single', $post->slug)  }}">{{ route('blog.single', $post->slug)  }}</a></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Create At:</dt>
                        <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-4">Last Update:</dt>
                        <dd class="col-sm-8">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger w-100">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success w-100">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>



@endsection