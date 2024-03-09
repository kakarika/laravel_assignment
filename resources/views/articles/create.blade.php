<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="">
    <a href="{{ route('articles.index') }}">
        <button type="button"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800
             focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5
              dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Articles</button>

    </a>
    <form action="{{ route('articles.store') }}" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium">Title</label>
            <input type="text" id="title" name="title" aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Title">
            @error('title')
                <span class="text-red-600 text-s">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="slug" class="block mb-2 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Slug">
            @error('slug')
                <span class="text-red-600 text-s">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="excerpt" class="block mb-2 text-sm font-medium">Excerpt</label>
            <textarea id="excerpt" rows="4" name="excerpt"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Excerpt"></textarea>
            @error('excerpt')
                <span class="text-red-600 text-s">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="context" class="block mb-2 text-sm font-medium">Context</label>
            <textarea id="context" rows="10" name="context"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Context"></textarea>
            @error('context')
                <span class="text-red-600 text-s">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="focus:outline-none text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-10 py-2.5 mt-5 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Create</button>
    </form>
</body>

</html>
