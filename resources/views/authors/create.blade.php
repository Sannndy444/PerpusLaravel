<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Author</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Create Author</h1>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <input type="text" name="author_name" placeholder="Author Name">
            <button type="submit">Submit</button>
        </form>
</body>
</html>
