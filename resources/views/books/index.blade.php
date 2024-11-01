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
        <div class="row">
            <div class="col">
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
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($book as $book)
                <div class="col">
                    <div class="card" style="width: 100%; border-width: 1px;">
                        @if($book->image)
                            <img src="{{ asset('storage/books/'.$book->image) }}" class="img-card-top" alt="{{ $book->image }}" style="height: 500px; object-fit: cover;">
                        @else
                            No Image
                        @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="text-center">{{ $book->title }}</h5>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col align-items-center">
                                        <p class="text-center">{{ $book->Author->author_name }}</p>  
                                    </div>
                                    <div class="col">
                                        <p class="text-center">|</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-center">{{ $book->publishedYear }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-center">|</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-center">{{ $book->Category->category_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary me-2">
                                            <a class="text-decoration-none text-light" href="{{ route('books.show', $book->id) }}">View</a>
                                        </button>

                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are sure to delete the book?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        
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