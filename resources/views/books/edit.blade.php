<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <div class="container p-5 my-3 border">
        <div class="row">
            <div class="col">
                <h1>Edit Book</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Book Title" name="title" id="title" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ old('title', $book->title) }}">
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="author_id" id="author_id">
                            <option selected disabled>Choose Author Name</option>
                                @foreach($author as $a)
                                    <option value="{{ $a->id }}" {{ $book->author_id == $a->id ? 'selected' : '' }}>{{ $a->author_name }}</option>
                                @endforeach
                        </select>
                        @error('author_id')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                            <option selected>Choose Category</option>
                                @foreach($category as $c)
                                    <option value="{{ $c->id }}"{{ $book->category_id == $c->id ? 'selected' : '' }}>{{ $c->category_name }}</option>
                                @endforeach
                        </select>
                        @error('category_id')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="publisher_id" id="publisher_id">
                            <option selected>Choose Publisher Name</option>
                                @foreach($publisher as $p)
                                    <option value="{{ $p->id }}" {{ $book->publisher_id == $p->id ? 'selected' : '' }}>{{ $p->publisher_name }}</option>
                                @endforeach
                        </select>
                        @error('publisher_id')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                            <option selected>Choose Type Book</option>
                                @foreach($type as $t)
                                    <option value="{{ $t->id }}" {{ $book->type_id == $t->id ? 'selected' : '' }}>{{ $t->type_name }}</option>
                                @endforeach
                        </select>
                        @error('type_id')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label for="formFile" class="form-control" id="fileLabel">
                            @if(isset($book->image))
                                ({{ $book->image }})
                            @endif
                        </label>
                        <input class="form-control" type="file" id="formFile" placeholder="Add Book Cover" name="image" value="{{ old('image', $book->image) }}">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add Publish Year" name="publishedYear" id="publishedYear" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ old('publishedYear', $book->publishedYear) }}">
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function updatePlaceholder() {
            const fileInput = document.getElementById("formFile");
            const fileLabel = document.getElementById("fileLabel");
            if (fileInput.files.length > 0) {
            // Jika ada file yang dipilih, ubah teks label sesuai dengan nama file
            fileLabel.textContent = fileInput.files[0].name;
        } else {
            // Kembalikan ke teks default jika tidak ada file yang dipilih
            fileLabel.textContent = "Add Book Cover"; // Teks default
            @if(isset($book->image)) // Jika ada gambar sebelumnya
                fileLabel.textContent += ` (${book->image})`; // Menampilkan nama file sebelumnya
            @endif
        }
        }
    </script>
</body>
</html>