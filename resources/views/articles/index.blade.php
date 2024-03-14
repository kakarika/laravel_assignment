<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-slate-600">
    <div class="flex">
        <a href="{{ route('articles.create') }}">
            <button type="button"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create</button>

        </a>

        <a href="{{ route('dashboard') }}">
            <button type="button"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Home</button>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Logout</button>
        </form>
    </div>

    <div class="flex flex-wrap items-start w-5/6 m-auto">
        @foreach ($articles as $a)
            <div
                class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">
                {{-- @foreach ($images as $i)
                    @if ($a->id == $i->article_id)
                        <img src="{{ asset('storage/articles/' . $i->image) }}"class="rounded-lg mb-2" alt=""
                            width="100px">
                    @endif
                @endforeach --}}
                @foreach ($a->images as $image)
                    <img src="{{ asset('storage/articles/' . $image->image) }}" alt="" class="rounded-lg mb-2"
                        width="100px">
                @endforeach
                <div class="flex items-center justify-between">
                    <a href="{{ route('articles.show', $a->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white me-5">
                            {{ $a->title }}
                        </h5>
                    </a>

                    {{-- <div>
                        @foreach ($images as $i)
                            <img src="{{ asset('storage/articles/' . $i->image) }}" alt="Article Image">
                        @endforeach
                    </div> --}}
                    <form action="{{ route('articles.destroy', $a->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash text-red-600"></i></button>
                    </form>
                </div>
                <p class="mb-3 text-xs text-gray-700 dark:text-gray-400">{{ $a->slug }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-4">{{ $a->excerpt }}
                </p>
                <a href="{{ route('articles.show', $a->id) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        @endforeach
    </div>

</body>

</html>
