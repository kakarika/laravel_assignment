@extends('layouts.master')

@section('content')
    <h1>Users create</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="name" value="{{ $user->name }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" placeholder="email" value="{{ $user->email }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" placeholder="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="confirm password">
            @error('password_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Register</button>
    </form>
@endsection
