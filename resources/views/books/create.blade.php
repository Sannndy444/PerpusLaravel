<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="author_id">Author:</label>
            <select name="author_id" id="author_id">
                @foreach($author as $a)
                    <option value="{{ $a->id }}">{{ $a->author_name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id">
                @foreach($category as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="publisher_id">Publisher:</label>
            <select name="publisher_id" id="publisher_id">
                @foreach($publisher as $p)
                    <option value="{{ $p->id }}">{{ $p->publisher_name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Book Cover Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <label for="publishedYear" class="form-label">Published Year</label>
            <input type="text" class="form-control" id="publishedYear" name="publishedYear" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>