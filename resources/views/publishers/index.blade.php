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

    <div class="container p-5 border">
        <div class="row">
            <div class="col">
                <h1>Publisher</h1>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary">
                    <a class="text-decoration-none text-light" href="{{ route('publishers.create') }}">Add Publisher</a>
                </button>
            </div>
        </div>

        <div class="row">
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
        </div>
        


        

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publisher as $publisher)
                    <tr>
                        <td>{{ $publisher->publisher_name }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('publishers.edit', $publisher->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                            </div>
                            <div class="row">
                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
