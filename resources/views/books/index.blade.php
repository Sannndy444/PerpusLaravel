<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <div class="container p-5 border">
        <div class="row">
            <div class="col">
                <h2>Books</h2>
            </div>
            <div class="col">
                <div class="position-relative">
                    <div class="position-absolute top-50 end-0 translate-bottom-y">
                        <button type="button" class="btn btn-primary">
                            <a class="text-decoration-none text-light" href="{{ route('books.create') }}">Add New Book</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($book as $book)
                <div class="col">
                    <div class="card">
                        @if($book->image_path)
                            <img src="{{ Storage::url($book->image_path) }}" class="card-img-top" alt="...">
                        @else
                            No Image
                        @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>