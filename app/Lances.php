<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lances extends Model
{
    protected $fillable = [
        'valor_lance',
        'num_card',
        'user_id',
        'pessoa_id',
        'edicao_id',
        'premio_id'
    ];
    public $rules = [
        'valor_lance'   => 'required',
        'tipo'          => 'required',
        'num_card'      => 'required|unique:lances'
    ];

    public $messages = [
//        'num_card.unique'   => 'O numero do CARD informado já encontra-se em uso!'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function premio()
    {
        return $this->belongsTo('App\Premio');
    }

    public function resultado()
    {
        return $this->hasMany('App\Resultado');
    }

    /*
     * Retorna todos os valores únicos cadastrados para um determinado premio na tabela lance.
     * $request = dados vindos da view "apuracao.blade"(premio_id,user_id,edicao_id) através do Reuest.
     */
    static function FiltraLanceUnico($request)
    {
        $idPremio = $request->premio_id;
        //recupera todos os lance para o premio com esse id, pois cada lance leva o id do premio.
        $lances = Lances::where('premio_id', $idPremio)->get();

        $results = (count($lances) != 0 ? $lances : $results = false);//verificar se retorna resultados para $lances.

        if ($results):
            //pega apenas os lances
            foreach ($results as $lances):
                for ($i = 0; $i <= count($lances) / 2; $i++):
                    $dados[] = "$lances->valor_lance";//recupera apenas o valor do lance.
                endfor;
            endforeach;


            //retorna quantas vezes cada lance tem valor repetido.
            $contaNumerosRepetidos = array_count_values($dados);
            $lanceUnico = [];

            foreach ($contaNumerosRepetidos as $key => $i) {
                if ($i == 1) {
                    //pegar apenas os lances que forem únicos.
                    array_push($lanceUnico, $key);
                }
            }
            return $lanceUnico;

        else:
            return false;
        endif;
    }

}
