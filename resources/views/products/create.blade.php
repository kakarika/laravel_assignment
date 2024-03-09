<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <form action="{{ route('products.store') }}" method="POST" class="max-w-md mx-auto mt-10">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium">Product Name</label>
            <input type="text" id="name" name="name" aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Name">
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium">Product
                description</label>
            <textarea id="description" rows="4" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Product Description"></textarea>
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium">Product price</label>
            <input type="number" name="price" id="price" aria-describedby="helper-text-explanation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Price">
        </div>
        <div>
            <label for="status" class="block mb-2 text-sm font-medium">Status</label>
            <select id="status" name="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Product Status</option>
                <option value="0">Completed</option>
                <option value="1">Incomplete</option>
            </select>
        </div>
        <button type="submit"
            class="focus:outline-none text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-10 py-2.5 mt-5 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800">Create</button>
    </form>
</body>

</html>
