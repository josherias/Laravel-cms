@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">My Profile</div>

    <div class="card-body">

        @include('partials.errors')

        <form action="{{ route('users.update-profile') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="about">About Me</label>
                <textarea col="5" row="5" class="form-control" id="about" name="about">{{$user->about}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection