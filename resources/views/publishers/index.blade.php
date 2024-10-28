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

    <div class="container p-5 my-3 border">
        <div class="row">
            <div class="col">
                <h1>Publisher</h1>
            </div>
            <div class="col">
                <div class="position-relative">
                    <div class="position-absolute top-50 end-0 translate-bottom-y">
                        <button type="button" class="btn btn-primary">
                            <a class="text-decoration-none text-light" href="{{ route('publishers.create') }}">Add New Publisher</a>
                        </button>
                    </div>
                </div>
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
                            <div class="grid gap-0 row-gap-3">
                                <div class="p-2 g-col-6">
                                    <a href="{{ route('publishers.edit', $publisher->id) }}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                </div>
                                <div class="p-2 g-col-6">
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
