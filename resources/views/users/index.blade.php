@extends('layouts.master')

@section('content')
    <a href="{{ route('users.create') }}">create</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="inline"><button
                                class="btn btn-info">Edit</button></a>
                        @if (Auth::user()->id != $user->id)
                            <form action="{{ route('users.destroy', $user->id) }}" class="inline" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
