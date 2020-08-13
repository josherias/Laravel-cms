@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category' }}
    </div>
    <div class="card-body">
        <!-- include error files -->
        @include('partials.errors')
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            <!-- caters fro the put request in forms -->
            @if(isset($category))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" class="form-control" name="name" value=" {{ isset($category) ? $category->name : '' }}">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($category) ? 'Update Category' : 'Add Category' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection