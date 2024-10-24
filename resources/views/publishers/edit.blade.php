<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publisher</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>
    <h1>Edit Publisher</h1>
        <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
            @csrf
            @method('PUT')
                    <input type="text" name="publisher_name" id="publisher_name" value="{{ old('publisher_name', $publisher->publisher_name) }}" required>
                    <button type="submit">Submit</button>
        </form>
</body>
</html>