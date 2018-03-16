<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Edicao;
use App\Pessoa;
use App\Lances;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LanceAdminController extends Controller
{
    private $Lance;

    public function __construct(Lances $lance)
    {
        $this->Lance = $lance;
    }

    /**
     * Persiste na tabala de lances um novo registro.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //não permitir cadastrar valor  = a 0
//        if (in_array( "R$ 0,00", $request->valor_lance)):
//
//            $pessoa = Pessoa::find($request->pessoa_id);
//            //dd($pessoa);
//            return view('admin.index', compact('pessoa'))->with('status', 'O Lance deve ser diferente de R$ 00,00');
//        endif;
//        dd($request->all());
//        $this->validate($request, $this->Lance->rules, $this->Lance->messages);

        $r = $request;
        $lancIdValor = array_combine($r->premio_id, $r->valor_lance);
        $numPremio = count($r->premio_id);

        foreach ($lancIdValor as $key => $valor):
            for ($i = 0; $i <= $numPremio; $i++):
                $dados = [
                    'valor_lance' => $lance = str_replace(',', '.', str_replace('.', '', trim(str_replace("R$ ", '', $valor)))),
                    'premio_id' => $key,
                    'num_card' => $r->num_card,
                    'user_id' => $r->tipo,
                    'pessoa_id' => $r->pessoa_id,
                    'edicao_id' => $r->edicao_id,
                ];
            endfor;
            $this->Lance->create($dados);
        endforeach;

        $ultEdi = Edicao::orderBy('id', 'desc')->first();
        $premio = ($ultEdi ? $ultEdi->premio : $premio = false);
        $ultEdicao = ($ultEdi ? $ultEdi : $ultEdicao = false);
        $participante = User::find($r->pessoa_id);

        return view('admin.index', compact('ultEdicao', 'premio'))
            ->withErrors('Lance cadastrado com sucesso para '.$participante->name.'!');
    }


}
