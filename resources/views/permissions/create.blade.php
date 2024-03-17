@extends('layouts.master')

@section('content')
    <form action="{{ route('permissions.store') }}" method="POST" class="max-w-md mx-auto mt-10" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium">Permission Name</label>
            <input type="text" id="name" name="name" aria-describedby="helper-text-explanation" class="form-control"
                placeholder="Name">
        </div>
        <button type="submit"
            class="focus:outline-none text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-10 py-2.5 mt-5 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Create</button>
    </form>
@endsection
