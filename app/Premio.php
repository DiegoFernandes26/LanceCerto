<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $fillable = [
        'name',
        'marca',
        'modelo',
        'descricao',
        'preco',
        'img_caminho',
        'user_id',
        'edicao_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function edicao(){
        return $this->belongsTo('App\Edicao');
    }

    public function lance(){
        return $this->hasMany('App\Lances');
    }

    public function resultado(){
        return $this->hasMany('App\Resultado');
    }


//
}
