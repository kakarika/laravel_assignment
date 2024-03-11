<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('articles.index') }}">
                        <button type="button"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Articles</button>

                    </a>
                    <a href="{{ route('products.index') }}">
                        <button type="button"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2.5 m-5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Products</button>

                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
