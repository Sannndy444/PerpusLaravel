<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Author</h1>
    <a href="{{ route('authors.create') }}">Create New Author</a>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    @foreach ($author as $author)


    

        <h1>Author List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $author->author_name }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author->id) }}">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>
    @endforeach
</body>
</html>
