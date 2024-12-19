<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElfController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', Auth::user()->id)->get();
        return view('elves.index', compact('children'));
    }

    public function delete_gift_child($child_id, $gift_id)
    {
        $child = Child::find($child_id);
        $child->gift()->detach($gift_id);
        return redirect()->back()
            ->with('success', 'Gift removed from child');
    }

    public function child_gift_add($child_id){
        $child = Child::find($child_id);
        $average = ($child->scolar_note + $child->behavior_note) / 2;
        $average >= 10 ?
            $gifts = Gift::where('good', true)->get() :
            $gifts = Gift::where('good', false)->get();
        return view('elves.gift_add', compact(['child', 'average', 'gifts']));
    }
}
