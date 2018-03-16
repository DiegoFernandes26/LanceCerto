<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'estado',
        'complemento'
    ];
}
