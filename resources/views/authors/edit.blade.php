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
    <h1>Edit Author</h1>
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
                    <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $author->author_name) }}" required>
                    <button type="submit">Submit</button>
        </form>
</body>
</html>