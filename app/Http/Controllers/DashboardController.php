<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller implements HasMiddleware
{

    //para bloquear o controlador todo tem que implementar o hasMiddleware e criar a função static; lembrar de importar a classe HasMiddleware;
    //tambem poderia ser feito diretamente na rota;
    public static function middleware() {
        return  ['auth'];
    }

    public function dashboardPage() {

        return view('users.dashboard_user');
    }

}
