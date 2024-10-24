<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <h1>Publisher</h1>
    <a href="{{ route('publishers.create') }}">Create New Publisher</a>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    @foreach ($publisher as $publisher)


    

        <h1>Publisher List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $publisher->publisher_name }}</td>
                    <td>
                        <a href="{{ route('publishers.edit', $publisher->id) }}">Edit</a>
                        <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST">
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
