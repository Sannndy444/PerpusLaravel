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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    


    

        <h1>Author List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($author as $author)
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
            @endforeach
        </tbody>
    </table>

</body>
</html>
