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

<div class="container my-3 p-5 border">
    <div class="row">
        <!-- Gambar Buku -->
        <div class="col-md-4">
            <img src="{{ Storage::url('books/' . $book->image) }}" alt="Gambar Buku" class="img-fluid rounded shadow">
        </div>
        
        <!-- Informasi Buku -->
        <div class="col-md-8">
            <h1 class="display-6">{{ $book->title }}</h1>
            <p class="text-muted">Author            : <strong>{{ $book->Author->author_name }}</strong></p>
            <p class="text-muted">Publisher         : <strong>{{ $book->Publisher->publisher_name }}</strong></p>
            <p class="text-muted">Published Year    : <strong>{{ $book->publishedYear }}</strong></p>
            <p class="text-muted">Category          : <strong>{{ $book->Category->category_name }}</strong></p>
            
            <div class="mt-4">
                <h5>Deskripsi</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.</p>
            </div>

            <div class="mt-4">
                <a href="#" class="btn btn-primary">Pinjam Buku</a>
                <a href="#" class="btn btn-secondary">Tambah ke Wishlist</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>