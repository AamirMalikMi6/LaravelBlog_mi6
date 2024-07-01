@extends('main')

@section('title', '- Create New Post')

@section('stylesheets')

<link rel="stylesheet" href="css/parsley.css">

@endsection

@section('content')

<div class="row">

    <div class="col-md-8 offset-2">
        <h1>Create New Post</h1>
        <hr>
    <form action="{{ route('posts.store') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required maxlength="255">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" required minlength="5" maxlength="30">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" placeholder="Body" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>

    </div>
</div>


@endsection

@section('scripts')

<script src="js/parsley.min.js"></script>

@endsection