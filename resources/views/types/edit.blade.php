<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <div class="container p-5 my-5 border">
        <div class="row">
            <div class="col">
                <h1>Edit Type</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('types.update', $type->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-success" type="submit" id="button-addon1">Edit</button>
                        <input placeholder="Type Name" class="form-control" type="text" name="type_name" id="type_name" value="{{ old('type_name', $type->type_name) }}" aria-label="Example text with button addon" aria-describedby="button-addon1" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>