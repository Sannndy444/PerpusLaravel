<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher = Publisher::all();
        return view('publishers.index', compact('publisher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'publisher_name' => 'required|string|max:255|unique:publishers,publisher_name'
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index')
                        ->with('succes', 'Publisher Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'publisher_name' => 'required|string|max:255|unique:publishers,publisher_name'
        ]);

        $publisher->update(all());

        return redirect()->route('publisers.index')
                        ->with('seucces', 'Publisher Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publisers.index')
                        ->with('success', 'Publisher Deleted successfully');
    }
}
