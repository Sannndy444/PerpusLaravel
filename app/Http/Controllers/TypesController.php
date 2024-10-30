<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Types::all();
        return view('types.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_name' => 'required|string|max:255|unique:types,type_name',
        ], [
            'type_name.required' => 'Type Name Is Required',
            'type_name.unique' => 'Type Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('types.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }

        Types::create($request->all());

        return redirect()->route('types.index')
                        ->with('success', 'Type Added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Types $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Types $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Types $type)
    {
        $validator = Validator::make($request->all(), [
            'type_name' => 'required|string|max:255|unique:types,type_name',
        ], [
            'type_name.required' => 'Type Name Is Required',
            'type_name.unique' => 'Type Name Already Exist'
        ]);
                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return redirect()->route('types.index')
                                    ->withErrors($validator)
                                    ->withInput();
                }

        $type->update($request->all());

        return redirect()->route('types.index')
                        ->withInput()
                        ->with('success', 'Type Added succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types $type)
    {
        if ($type) {
            if ($type->count() > 0) {
                return redirect()->route('types.index')
                                ->withErrors('Tidak bisa menghapus data ini karena masih terhubung dengan buku.');
            }

            $type->delete();
            return redirect()->route('types.index')
                            ->with('success', 'Type deleted successfully');
        }

        return redirect()->route('types.index')->withErrors('Type tidak ditemukan.');
    }
}
