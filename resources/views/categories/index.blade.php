@extends('main')

@section('title', '- All Categories')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Categories</h3>
            </div>
            <!-- table of category -->
            @if($categories->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <!-- create a new category  -->
            <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="card-header">
                <h3 class="card-title">New Category</h3>
            
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <button type="submit" class="btn btn-primary mt-2 w-100">Create New Category</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>

@endsection