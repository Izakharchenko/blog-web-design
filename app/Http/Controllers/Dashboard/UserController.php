<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::select('id', 'full_name', 'email', 'is_author', 'created_at')->paginate(15);

        return view('dashboard.user.index', ['users' => $users]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Дані користувача оновлені!');
    }


    public function destroy(User $user)
    {
        if (Auth::id() !== $user->id) {
            $user->delete();
            $message = "Користувача $user->full_name було видалено!";

            return redirect()->route('users.index')->with('success', $message);
        }

        return redirect()->route('users.index')->withErrors("Щось пішло не так");
    }
}
