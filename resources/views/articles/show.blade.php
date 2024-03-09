<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-600 text-white">
    <div class="w-3/4 m-auto mt-5">
        <h1 class="text-4xl font-bold text-center">{{ $article->title }}</h1>
        <p class=" text-s mb-5">{{ $article->created_at->format('j-F-Y') }}</p>
        <p class="">{{ $article->context }}</p>
        <a href="{{ route('articles.edit', $article->id) }}">
            <button type="button"
                class="focus:outline-none text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium
            rounded-lg text-sm px-10 py-2.5 mt-5 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Edit</button>
        </a>
    </div>
</body>

</html>
