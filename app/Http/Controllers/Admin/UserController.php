<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUpdateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Verifica se já existe um admin cadastrado, para decidir se mostra a opção de criar usuário comum ou não
        $hasAdmin = User::where('is_admin', 1)->exists();
        return view('admin.users.create', compact('hasAdmin'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateUser $request)
    {
        // Se não existe nenhum usuário, força como admin
        $isFirstUser = User::count() === 0;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isFirstUser ? 1 : ($request->is_admin ?? 0),
        ]);

        // Se for o primeiro usuário, redireciona direto para login
        if ($isFirstUser) {
            return redirect()->route('login')->with('success', 'Administrador criado com sucesso! Faça login.');
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
