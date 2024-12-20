<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SantaController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', null)->get();
        return Auth::user()->role === 'santa' ?
            view('santa.index', compact('children')) :
            redirect('/');
    }

    public function elf_child_add($child_id)
    {
        $child = Child::find($child_id);
        $elves = User::all();
        return Auth::user()->role === 'santa' ?
            view('santa.elf_child', compact(['child', 'elves'])) :
            redirect('/');
    }

    public function elf_child_store(Request $request)
    {
        $child_id = $request->child_id;
        $elf_id = $request->elf;
        $elf = User::find($elf_id);
        $child = Child::find($child_id);
        $child->user_id = $elf_id;
        $child->update();
        return redirect()->route('santa_home')
            ->with('sucess', $elf->name . ' attribué à ' . $child->first_name . ' ' . $child->last_name );
    }
}
