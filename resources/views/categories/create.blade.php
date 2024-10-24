<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Create Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <input type="text" name="category_name" placeholder="Category Name">
            <button type="submit">Submit</button>
        </form>
</body>
</html>