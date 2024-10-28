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
                <h1>Add New Book</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Book Title" name="title" id="title" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example" name="author_id" id="author_id">
                            <option selected>Choose Author Name</option>
                                @foreach($author as $a)
                                    <option value="{{ $a->id }}">{{ $a->author_name }}</option>
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
                                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
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
                                    <option value="{{ $p->id }}">{{ $p->publisher_name }}</option>
                                @endforeach
                        </select>
                        @error('publisher_id')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label for="formFile" class="form-control" id="fileLabel">Add Book Cover</label>
                        <input class="form-control" type="file" id="formFile" placeholder="Add Book Cover" name="image">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Add Publish Year" name="publishedYear" id="publishedYear" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>

                    <div class="inpu-group mb-3">
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
            fileLabel.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : "Add Book Cover";
        }
    </script>
</body>
</html>