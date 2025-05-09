@extends('layouts.app')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
                user Details
                <div class="float-end">
                    <form style="display:inline" method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">{{ $user->email }}</p>
            </div>
        </div>
    </div>
@endsection