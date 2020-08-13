@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit tag' : 'Create tag' }}
    </div>
    <div class="card-body">
        <!-- include error files -->
        @include('partials.errors')
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
            @csrf
            <!-- caters fro the put request in forms -->
            @if(isset($tag))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">tag Name</label>
                <input type="text" id="name" class="form-control" name="name" value=" {{ isset($tag) ? $tag->name : '' }}">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($tag) ? 'Update tag' : 'Add tag' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection