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
        $sortColumn2 = $request->input('sort_column2');
        $sortDirection2 = $request->input('sort_direction2');
        if($sortColumn2 && $sortDirection2){
            $gifts = Gift::orderBy($sortColumn, $sortDirection)->orderBy($sortColumn2, $sortDirection2)->paginate(15);
        } elseif($sortColumn === 'category_id'){
            $gifts = Gift::with('category')
                ->join('categories', 'gifts.category_id', '=', 'categories.id')
                ->orderBy('categories.name', $sortDirection)
                ->select('gifts.*')
                ->orderBy('gifts.name', 'asc')
                ->paginate(15);
        }
        else{
            $gifts = Gift::orderBy($sortColumn, $sortDirection)->paginate(15);
        }
        return view('gifts.index', compact(['gifts', 'allGifts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
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

        return redirect()->route('gifts.index')
            ->with('success', $gift->name . ' créé avec succès!');
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
        $categories = Category::orderBy('name', 'asc')->get();
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

        return redirect()->route('gifts.index')
            ->with('success', $gift->name . ' a bien été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ImageService $imageService)
    {
        $gift = Gift::findOrFail($id);
        $name = $gift->name;
        try{
            $imageService->deleteImages($gift->id, 'gifts');
            $gift->delete();
            $type = 'success';
            $message = $name . ' supprimé avec succès';
        } catch (\Exception $e){
            $type = 'error';
            $message = 'Impossible de supprimer ' . $name;
        }
        return redirect('/gifts')
            ->with($type, $message);
    }
}
