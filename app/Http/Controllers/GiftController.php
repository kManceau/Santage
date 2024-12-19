<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ImageService;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allGifts = Gift::orderBy('name', 'asc')->get();
        $sortColumn = $request->input('sort_column', 'name');
        $sortDirection = $request->input('sort_direction', 'asc');
        $gifts = Gift::orderBy($sortColumn, $sortDirection)->paginate(15);
        return view('gifts.index', compact(['gifts', 'allGifts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('gifts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImageService $imageService)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'good' => 'boolean',
            'category_id' => 'required',
        ]);


        $gift = new Gift([
            'name' => $request->name,
            'description' => $request->description,
            'good' => $request->good,
            'category_id' => $request->category_id,
        ]);

        $gift->save();
        if($request->hasFile('image')){
            $imageService->uploadImages($request->file('image'), $gift->id, 'gifts');
        }

        return redirect()->route('gifts.index')->with('success', 'Produit créé avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gift = Gift::findOrFail($id);
        $categories = Category::all();
        return view('gifts.edit', compact('gift','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, ImageService $imageService)
    {
        $gift = Gift::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'good' => 'boolean',
            'category_id' => 'required',
        ]);

        $gift->update($validatedData);
        if($request->hasFile('image')){
            $imageService->uploadImages($request->file('image'), $gift->id, 'gifts');
        }

        return redirect()->route('gifts.index')->with('success', 'Cadeau a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ImageService $imageService)
    {
        $gift = Gift::findOrFail($id);
        $imageService->deleteImages($gift->id, 'gifts');
        $gift->delete();
        return redirect('/gifts')->with('success', 'Cadeau supprimé avec succès');
    }
}
