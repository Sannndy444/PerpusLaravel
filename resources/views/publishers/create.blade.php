<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Publisher</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Create Publisher</h1>
        <form action="{{ route('publishers.store') }}" method="POST">
            @csrf
            <input type="text" name="publisher_name" placeholder="Publisher Name">
            <button type="submit">Submit</button>
        </form>
</body>
</html>
