@extends('layouts.master')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="p-5">
        @csrf
        <div class="my-3">
            <label for="">Name</label>
            <input type="text" name="name" placeholder="name" class="form-control">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="my-3">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="email" class="form-control">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="my-3">
            <label for="">Role</label>
            <select name="role_id" id="" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-3">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="password" class="form-control">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="my-3">
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="confirm password" class="form-control">
            @error('password_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn bg-success text-white">Register</button>
    </form>
@endsection
