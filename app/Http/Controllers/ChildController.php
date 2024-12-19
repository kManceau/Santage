<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children = Child::with('user')->get();
        return view('children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = $this->getCountries();
        $users = User::pluck('name', 'id');
        return view('children.create', compact( 'users', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'country' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required|string|max:10',
            'postal_code' => 'required|string',
            'scolar_note' => 'required|numeric',
            'behavior_note' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        Child::create($validated);
        return redirect()->route('children.index')->with('success', 'Child created successfully.');
    }

    public function show($id)
    {
        $child = Child::findOrFail($id);
        return view('children.show', compact('child'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        $countries = $this->getCountries();
        $users = User::pluck('name', 'id');
        return view('children.edit', compact('child', 'countries',  'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Child $child)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'country' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required|string|max:10',
            'postal_code' => 'required|string',
            'scolar_note' => 'required|numeric',
            'behavior_note' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $child->update($validated);
        return redirect()->route('children.index')->with('success', 'Child updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        $child->delete();
        return redirect()->route('children.index')->with('success', 'Child deleted successfully.');
    }

    public function getCountries(){
        $countries = Http::withOptions(['verify' => false])
        ->get('https://restcountries.com/v3.1/all?fields=name');
        $countries = $countries->json();
        usort($countries, function ($a, $b) {
            return $a['name']['common'] <=> $b['name']['common'];
        });
        return $countries;
    }
}
