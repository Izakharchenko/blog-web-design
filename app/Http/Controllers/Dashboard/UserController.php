<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'full_name', 'email', 'is_author', 'created_at')->paginate(15);

        return view('dashboard.user.index', ['users' => $users]);
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Дані користувача оновлені!');
    }

    /**
     * Remove the specified resource from storage.
     */
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
