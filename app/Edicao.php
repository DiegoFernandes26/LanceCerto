<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Edicao extends Model


{
    protected  $fillable = [
        'numero',
        'name',
        'dt_apuracao',
        'hora_apuracao',
        'tiragem_min',
        'tiragem_max',
        'valor_card',
        'valor_comissao',
        'user_id',
        'apurado'
    ];

    //validação de formulário   
    public $rules = [
        'numero'      => 'required|integer|unique:edicaos',
        'tiragem_min' => 'required|integer|',
        'tiragem_max' => 'required|integer|',
        'dt_apuracao' => 'required|date'
    ];

    //validação de formulário
    public $messages = [
        'numero.required' => 'Você deve informar um numero para edição.',
        'numero.numeric' => 'Deve ser fornecido um numero do tipo inteiro para "Numero".',
        'numero.unique' => 'Já existe uma "Edição" cadastrada com o numero informado.',
        'dt_apuracao.required' => 'Você deve informar uma data no campo "Data".'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function premio()
    {
        return $this->hasMany('App\Premio');
    }

    public function resultado()
    {
        return $this->hasMany('App\Resultado');
    }

    public function lances()
    {
        return $this->hasMany('App\Lances');
    }

    //mutador para a data de apuraçao
    public function setDtApuracaoAttribute($value)
    {
        $data = new Carbon($value);
        $this->attributes['dt_apuracao'] = $data->toDateString();
    }

}
