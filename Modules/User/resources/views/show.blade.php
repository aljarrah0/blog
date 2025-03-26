@extends('user::layouts.master')
@section('content')
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
                user Details
                <div class="float-end">
                    <form style="display:inline" method="user" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->title }}</h5>
                <p class="card-text">{{ $user->description }}</p>
                <p class="card-text">{{ $user->user->name }}</p>
            </div>
        </div>
    </div>
@endsection