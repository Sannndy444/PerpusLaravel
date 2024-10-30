<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
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
        $validator = Validator::make($request->all(), [
            'author_name' => 'required|string|max:255|unique:authors,author_name',
        ], [
            'author_name.required' => 'Author Name Is Required',
            'author_name.unique' => 'Author Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('authors.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }


        Author::create($request->all());

        return redirect()->route('authors.index')
                        ->with('success', 'Author added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validator = Validator::make($request->all(), [
            'author_name' => 'required|string|max:255|unique:authors,author_name',
        ], [
            'author_name.required' => 'Author Name Is Required',
            'author_name.unique' => 'Author Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('authors.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }

        $author->update($request->all());

        return redirect()->route('authors.index')
                        ->with('success', 'Author Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author) {
            if ($author->books()->count() > 0) { // Menggunakan books() dengan huruf kecil
                return redirect()->route('authors.index')
                                ->withErrors('Tidak bisa menghapus data ini karena masih terhubung dengan buku.');
            }

            $author->delete();
            return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
        }

        return redirect()->route('authors.index')->withErrors('Penulis tidak ditemukan.');
    }
}