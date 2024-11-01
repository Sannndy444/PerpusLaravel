<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <div class="container p-5 my-3 border">
        <div class="row">
            <div class="col">
                <h1>Type</h1>
            </div>
            <div class="col">
                <div class="position-relative">
                    <div class="position-absolute top-50 end-0 translate-bottom-y">
                        <button type="button" class="btn btn-primary">
                            <a class="text-decoration-none text-light" href="{{ route('types.create') }}">Add New Type</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($type as $t)
                    <tr>
                        <td>{{ $t->type_name }}</td>
                        <td>
                            <div class="grid gap-0 row-gap-3">
                                <div class="p-2 d-flex align-items-center">
                                    <form action="{{ route('types.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete author?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('types.edit', $t->id) }}" class="btn btn-primary ms-2">Edit</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>