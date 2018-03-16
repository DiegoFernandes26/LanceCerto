<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

use App\Edicao;
use App\Lances;
use App\Resultado;
use App\Pessoa;
use App\Ganhador;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class ApuracaoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idpremio = Resultado::lists('premio_id')->all();

        $ultEdicao = \App\Edicao::orderBy('id', 'desc')->first();
        return view('admin.edicao.apuracao.apuracao', compact('ultEdicao', 'idpremio'));
    }


    /**
     * Recupera os dados vindos da view "apuracao.blade"(premio_id,user_id,edicao_id) através do Reuest.
     * @return \Illuminate\Http\Response
     */
    public function buscarMenorLanceNoBanco(Request $request)
    {
        $acertador = Resultado::inserEresultadoNaTabelaGanhador(
            Lances::FiltraLanceUnico($request),
            $request->premio_id);

        $ultEdicao = \App\Edicao::find($request->edicao_id);
        if ($acertador):
            $ganhador = Ganhador::where('edicao_id', $ultEdicao->id)->get();
            $ultEdicao->update(['apurado'=>true]);
            return view('admin.edicao.apuracao.ganhador', compact('ganhador', 'ultEdicao'));//
        else:
            return back()->with('status', 'Não há lance único para este premio!');
        endif;

    }


    /**
     * Retorna um array com ganhadores dos prêmios da última edição.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $hoje = date('Y-m-d');
        $ultEdicao = \App\Edicao::where('dt_apuracao','<=',$hoje)
            ->orWhere('apurado',1)
            ->orderBy('id', 'desc')
            ->first();

        $ganhador = Ganhador::where('edicao_id', $ultEdicao->id)->get();

        return view('admin.edicao.apuracao.ganhador', compact('ganhador', 'ultEdicao'));
    }

}
