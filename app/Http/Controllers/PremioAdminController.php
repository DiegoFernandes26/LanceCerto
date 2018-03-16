<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Premio;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PremioAdminController extends Controller
{

    private $Premio;

    public function __construct(Premio $premio)
    {
        $this->Premio = $premio;
    }

    /** Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $edicao = DB::table('edicaos')
            ->where('id', $id)->get();
        return view('admin.edicao.premios.create', compact('edicao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addPremio = new Premio();

        //inicio criação do nome da imagem
        $data = \Carbon\Carbon::now();
        $dt = $data->ToDateString();
        $micro = $data->micro;
        $hr = $data->format('H-i-s-m');
        $dtHora = $dt . '-' . $hr . '-' . $micro;

        $request->file('img_caminho')
            ->move('img/premios/', $dtHora . '.' . $request->file('img_caminho')
                    ->GetClientOriginalExtension());
        $nameimg = 'img/premios/' . $dtHora . '.' . $request->file('img_caminho')
                ->GetClientOriginalExtension();

        //fim da criação nome imagem, agora a imagem ja está salva na pasta 'img/premios/

        //checa se ja existe alguma imagem com esse nome, se existir é realizada uma mudança
        $vercaminho = $addPremio::where('img_caminho', '=', $nameimg)->first();
        $caminho = ($vercaminho != null ? $caminho = $micro . '-' . $nameimg : $nameimg);


        $addPremio->name = $request->input('name');
        $addPremio->marca = $request->input('marca');
        $addPremio->modelo = $request->input('modelo');
        $addPremio->descricao = $request->input('descricao');
        $addPremio->preco = $request->input('preco');
        $addPremio->img_caminho = $caminho;
        $addPremio->user_id = $request->input('user_id');
        $addPremio->edicao_id = $request->input('edicao_id');

        $addPremio->save();


        return redirect()
            ->route('painel.admin.edicao')
            ->with('status', 'Premio cadastrado com sucesso! :)');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $premio = premio::find($id)->first();

        return view('admin.edicao.premios.edit', compact('premio'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Premio->find($id)->delete();
        return redirect()->route('painel.admin.edicao');
    }
}
