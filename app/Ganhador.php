<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ganhador extends Model
{
    protected $fillable = [
        'name',
        'rg',
        'celular',
        'email',
        'num_card',
        'lance',
        'premio_id',
        'user_id',
        'edicao_id'
    ];
}
