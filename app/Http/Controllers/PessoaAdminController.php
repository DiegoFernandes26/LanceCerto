<?php

namespace App\Http\Controllers;

use App\Edicao;
use App\Pessoa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class PessoaAdminController extends Controller
{
    private $ultEdicao;
    /** Reorna Premios ou false - Verifica se existe premios vinculados à ultima edição*/
    private $premio;
    /** Reorna Acertadores ou false - Verifica se existe acertadoes para a ultima edição*/
    private $acertadores;

    public function __construct()
    {
        $ultEdi = Edicao::orderBy('id', 'desc')->first();
        $this->ultEdicao = ($ultEdi ? $ultEdi : $this->ultEdicao = null);
        $this->acertadores = ($this->ultEdicao->resultado != null ? $this->ultEdicao->resultado : $this->acertadores = null);
        $this->premio = ($this->ultEdicao->premio ? $this->ultEdicao->premio : $this->premio = null);
    }


    public function new()
    {
        return view('admin.edicao.pessoa.create');
    }

    /*
     * Atendo à busca por participantes do LanceCerto, aceita rg, email ou celular na busca.
     */
    public function search(Request $request)
    {
        //retorna para que as condicionais da index funcionem com essa variáveis carregadas
        $ultEdicao = $this->ultEdicao;
        $premio = $this->premio;
        //$acertadores = Para ser usado para mostrar ou não no menur a opção de ver pagina de acertadores da ultima edicão.
        $acertadores = $this->acertadores;

        $dados = $request->busca;
        $result = DB::table('users')
            ->where('email', $request->busca)
            ->orWhere('cpf',$request->busca)
            ->orWhere('celular', $request->busca)
            ->first();

        $pessoa = ($result ? $result : $result = false);
        $consultores = User::where('tipo', '<', 3)
            ->lists('name', 'id');

        if ($pessoa):
            return view('admin.edicao.lance.conteiner', compact('ultEdicao', 'pessoa', 'premio', 'acertadores', 'consultores'));
        else:
            return view('admin.edicao.pessoa.create');
        endif;
    }

    /**
     * Insere um novo participante no banco de dados.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'cpf' => 'cpf|required|unique:users'
            ]);

        $request['tipo'] = 3;
        $pessoa = User::create($request->all());

        //retorna para que as condicionais da view index funcionem com essa variáveis carregadas
        $consultores = User::where('tipo', '<', 3)
            ->lists('name', 'id');

        $ultEdicao = $this->ultEdicao;
        $premio = $this->premio;

        //$acertadores = Para ser usado para mostrar ou não no MENU LATERAL a opção de ver pagina de acertadores da ultima edicão.
        $acertadores = $this->acertadores;

        return view('admin.index', compact('ultEdicao', 'pessoa', 'premio', 'acertadores', 'consultores'));

    }

    /*
     * Retorna todos os numeros de celulares do participantes.
     */
    public function listCelular()
    {
        $celular = User::where('tipo', 3)
            ->lists('celular');

        $premio = $this->premio;
        $acertadores = $this->acertadores;

        return view('admin.edicao.pessoa.listcelular', compact('celular', 'premio', 'acertadores'));
    }
}
