<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::all();
        return view('authors.index', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'author_name' => 'required|string|max:255'
        ]);

        // Cek apakah data yang sama sudah ada
        $existingAuthor = Author::where('author_name', $request->author_name)->first();

        if ($existingAuthor) {
            // Jika duplikat ditemukan, kembalikan dengan pesan error
            return redirect()->route('authors.index')
                            ->withInput()
                            ->with('error', 'Author already exists.');
        }

        // Simpan data baru jika tidak ada duplikat
        Author::create($request->all());

        return redirect()->route('authors.index')
                        ->with('success', 'Author added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'author_name' => 'required|string|max:255'
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')
                        ->with('success', 'Author Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
                        ->with('success', 'Author Deleted successfully');
    }
}
