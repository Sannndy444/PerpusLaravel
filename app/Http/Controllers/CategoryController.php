<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ], [
            'category_name' => 'Category Name Is Required',
            'category_name' => 'Category Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('categories.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }

        Category::create($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Category Added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|string|max:255|unique:categories,category_name',
        ], [
            'category_name' => 'Author Name Is Required',
            'category_name' => 'Author Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('categories.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }

        $category->update($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Category Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            if ($category->count() > 0) {
                return redirect()->route('categories.index')
                                ->withErrors('Tidak bisa menghapus data ini karena masih terhubung dengan buku.');
            }

            $category->delete();
            return redirect()->route('categories.index')
                            ->with('success', 'Category deleted successfully');
        }

        return redirect()->route('categories.index')->withErrors('Category tidak ditemukan.');
    }
}
