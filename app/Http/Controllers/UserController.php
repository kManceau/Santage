<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
{
    // Получаем всех пользователей
    $users = User::all();


    if (Auth::check() && Auth::user()->role == 'santa') {
        $users = User::all();

        return view('user.index', ['users' => $users]);
    } else {
        // Редирект с сообщением об ошибке, если условия не выполнены
        return redirect()->route('home')->withErrors([
            'erreur' => 'Доступ запрещен. Вы должны быть авторизованы и иметь роль "santa".'
        ]);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->role == 'santa') {
            return view('user.edit', compact('user'));
        } else {
            return redirect('user.edit')->withErrors(['erreur' => 'Modification du compte impossible']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id || Auth::user()->role == 'santa') {
            $request->validate([
                'name' => 'required|max:40',
                'role' => 'nullable|max:10'
            ]);


            $user->update($request->all());

            return back()->with('message', 'Le compte a bien été modifié.');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
