<?php

namespace App\Http\Controllers;

use App\Edicao;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EdicaoAdminController extends Controller
{
    protected $Edicao;

    public function __construct(Edicao $edicao)
    {
        $this->Edicao = $edicao;
    }

    /*
     * Lista todas as edições em ordem decrescente.
     */
    public function index()
    {
        $edi = $this->Edicao::orderBy('id', 'desc')->get();
        return view('admin.edicao.index', compact('edi'));
    }

    /** Retorna uma view com dados o numero da ultima edição incrementado e a tiragem minima.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultEdicao = $this->Edicao::orderBy('id', 'desc')->first();
        if($ultEdicao):
            $tmin = ($ultEdicao->tiragem_max ? $ultEdicao->tiragem_max : $tmin = 1);
        else:
            $tmin = 1;
        endif;
        
        $numeroEd = ($ultEdicao ? $ultEdicao->numero +1 : 1);

        return view('admin.edicao.create', compact('numeroEd', 'tmin'));
    }

    /**
     * Criar na tabela Edicaos um novo registro que corresponde a uma nova edição.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->Edicao->rules, $this->Edicao->messages);

        $this->Edicao->create($request->all());
        return redirect()
            ->route('painel.admin.edicao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edicao = $this->Edicao->find($id);
        //verifica se existe prêmios vinculados a essa edição
        $ifpremioExist = DB::table('premios')->where('edicao_id', $id)->get();
        $premios = ($ifpremioExist ? $ifpremioExist : $premios = false);
        return view('admin.edicao.show', compact('edicao', 'premios'));
    }

    /**
     * Edita uma edição específica.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edicao = $this->Edicao->find($id);
        $dt = new Carbon();
        $dt->format($edicao->dt_apuracao);
        $tmin = $edicao->tiragem_min;
        return view('admin.edicao.edit', compact('edicao', 'tmin'));
    }

    /**
     * Salva os dados da edição atualizada.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->Edicao->find($id)->update($request->all());
        return redirect()->route('painel.admin.edicao');
    }

    /**
     * Deleta uma Edição especificada através de id.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Edicao->find($id)->delete();

        return redirect()->route('painel.admin.edicao')->with('status', 'Deletado com sucesso!!', 10);


    }
}
