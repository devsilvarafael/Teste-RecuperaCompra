<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name'=>'required|regex:/^[a-zA-Z ]+$/u|string',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:5|confirmed'
        ], [
            'email.unique' => 'E-mail já cadastrado',
            'name.regex' => 'Formato inválido, use apenas letras.',
            'password.confirmed' => 'Confirmação de senha inválida.'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        notify()->success('Usuário criado com sucesso.', 'Yes! :)');

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->name = $request->input('name');

        $user->email = $request->input('email');

        $user->save();

        notify()->success('Usuário editado com sucesso.', 'Yes! :)');

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado.');
        }

        if ($user->id === auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'Você não pode excluir a si mesmo.');
        }

        $user->delete();
        auth()->user()->setRememberToken(null);

        notify()->success('Usuário excluído com sucesso.', 'Yes! :)');

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }

    public function searchForUser(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->get();

        return view('users.index', compact('users'));
    }
}
