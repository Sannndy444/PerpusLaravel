<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Category</h1>
    <a href="{{ route('categories.create') }}">Create New Category</a>

    @if ($massage = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    @foreach ($category as $category)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>
                                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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