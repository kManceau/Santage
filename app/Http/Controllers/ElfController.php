<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Child;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElfController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', Auth::user()->id)
            ->orderBy('first_name')
            ->paginate(15);
        $childrenWG = $children->reject(function ($child) {
           return $child->gift()->count() > 0;
        });
        return view('elves.index', compact(['children', 'childrenWG']));
    }

    public function delete_gift_child($child_id, $gift_id)
    {
        $child = Child::find($child_id);
        $child->gift()->detach($gift_id);
        return redirect()->back()
            ->with('success', 'Cadeau repris à ' . $child->first_name . ' ' . $child->last_name);
    }

    public function child_gift_add($child_id){
        $child = Child::find($child_id);
        $categories = Category::all();
        $average = ($child->scolar_note + $child->behavior_note) / 2;
        $average > 10 ?
            $gifts = Gift::where('good', true)->get() :
            $gifts = Gift::where('good', false)->get();
        return view('elves.gift_add', compact(['child', 'average', 'gifts', 'categories']));
    }

    public function child_gift_store(Request $request){
        $child_id = $request->child_id;
        $gift_id = $request->gift;
        $child = Child::find($child_id);
        $child->gift()->attach($gift_id);
        return redirect()->route('elf_home')
            ->with('success', 'Cadeau attribué à ' . $child->first_name . ' ' . $child->last_name);
    }
}
