<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lances;
use App\Pessoa;
use App\Ganhador;

class Resultado extends Model
{
    protected $fillable = [
        'user_id',
        'edicao_id',
        'pessoa_id',
        'premio_id',
        'lance_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function edicao()
    {
        return $this->belongsTo('App\Edicao');
    }

    public function premio()
    {
        return $this->belongsTo('App\Premio');
    }

    public function lance()
    {
        return $this->hasMany('App\Lances');
    }


    /* Deve ser fornecido o valor do menor lance único. Essa função verificará os dados do dono desse lance e persistirá em outra tabela
     * retornando os dados da pessoa que acertou o menor lance único.
     * $request = valor do menor lance unico, retornado da tabela Lances.
     */
    static function inserEresultadoNaTabelaGanhador($request, $idPremio)
    {
        if ($request)://valor do menor lance unico, retornado da tabela Lances.
//
            $rFinal = number_format(min($request), 2, ',', '.'); //converte de '0.00' para '0,00'

            $resultFim = floatval(str_replace(',', '.', str_replace('.', '', $rFinal)));//converte de (string)'0,00' para (inteiro)0.00

            //busca na tabela de lances o valor igual ao obtido como menor valor unico e
            // retorna todos os dados referentes a esse lance.
            $result = \App\Lances::where('valor_lance', $resultFim)
                ->where('premio_id', $idPremio)
                ->first();
            $donoDoMenorLance = [
                'user_id' => $result->user_id,
                'edicao_id' => $result->edicao_id,
                'pessoa_id' => $result->pessoa_id,
                'premio_id' => $result->premio_id,
                'lance_id' => $result->id,
            ];

            //insere os dados referente ao menor lance na tabela resultado indicando quem ganhou aquele premio.
            $resultExist = Resultado::where('premio_id', $idPremio)
                ->where('edicao_id', $result->edicao_id)
                ->first();
            $r = ($resultExist ? $resultExist : $r = false);

            //se ja existir alum resultado de sorteio com o premio_id e edicao_id iguais aos parametros passadas ele retorna false
            //e não cria outro registro(prevenir que exista dois registros para o mesultado).
            if (!$r):
                Resultado::create($donoDoMenorLance);

                $participante = User::find($result->pessoa_id);
                $ganhador = [
                    'name' => $participante->name,
                    'rg' => ($participante->rg?$participante->rg:00),
                    'celular' => $participante->celular,
                    'num_card' => $result->num_card,
                    'lance' => $rFinal,
                    'premio_id' => $result->premio_id,
                    'user_id' => $result->user_id,
                    'edicao_id' => $result->edicao_id,
                ];
                Ganhador::create($ganhador);//cria um registro na tabela ganhador, informando todos os dados necessários.
                return true;
            else:
                return true;
            endif;
        else:
            return false;
        endif;
    }
}
