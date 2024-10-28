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

    <div class="container p-5 my-3 border">
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
                        @if($book->image)
                            <img src="{{ Storage::url('books/' . $book->image) }}" class="img-card-top" alt="{{ $book->image }}">
                        @else
                            No Image
                        @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary">
                                            <a class="text-decoration-none text-light" href="{{ route('books.show', $book->id) }}">View</a>
                                        </button>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>