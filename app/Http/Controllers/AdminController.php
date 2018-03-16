<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edicao;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }


    public function index()
    {
        $ultEdi = Edicao::orderBy('id', 'desc')
            ->where('apurado',false)
            ->first();
        $ultEdicao = ($ultEdi ? $ultEdi : $ultEdicao = false);
        $premio = ($ultEdicao ? ($ultEdicao->premio ? $ultEdicao->premio : $premio = null): $premio = null);
        $acertador = ($ultEdicao ? ($ultEdicao->resultado ? $ultEdicao->resultado : $acertador = null) : $acertador = null);

        return view('admin.index', compact('ultEdicao', 'premio', 'acertador'));
    }

}
