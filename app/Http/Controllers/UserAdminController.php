<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\User;

class UserAdminController extends Controller
{
    protected $AuthController;

    public function __construct(AuthController $auth, User $user)
    {
        $this->AuthController = $auth;
        $this->user = $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /*
     * Responsável por criar um novo usuário na tabela User.
     */
    public function postRegister(Request $request)
    {
        $this->validate($request, $this->user->rules);

        $newUser = $this->AuthController
            ->create($request->all());

        return redirect()
            ->route('usuarios.lists')
            ->with('status', 'Usuário ' . $newUser->name . ' criado com sucesso!');
    }


    /*
     * Lista todos os usuários, em ordem alfabética, com exceção do atualmente logado e os "participantes".
     */
    public function lists()
    {
        $id = Auth()->user()->id;
        $users = User::orderBy('name', 'asc')
            ->where('id', '!=', $id)
            ->where('tipo', '!=', 3)
            ->get();

        return view('admin.usuarios.listar', compact('users'));
    }


    /**
     * Busca um usuário na tabela user, através do id. Caso encontrado retorna para a view de edição.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.usuarios.edit', compact('user'));
    }

    /**
     * Atualiza, na tabela user, o usuário com o id informado.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $dados = $request->all();
        $this->validate($request, $this->user->rulesUpdate($id));
        if (Auth()->user()->tipo != 1) {
            unset($dados['tipo']);
        }

        if ($dados['password'] != null) {
            $dados['password'] = bcrypt($dados['password']);
        } else {
            unset($dados['password']);
        }

        if ($user) {
            $user->update($dados);
            return redirect()
                ->route('usuarios.lists')
                ->with('status', 'Usuário ' . $user->name . ' atualizado com sucesso!');
        } else {
            return back()
                ->withErrors('Usuário não encontrado!');
        }
    }

    /**
     * Quando for implementado, será responsável por deletar usuário do sistema..
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
