<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evaluacion;

//Controlador Home, que incluye el index hacia la vista donde se ingresa una vez que se inicia la sesion
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

//envia a la vista home, pantalla principal al ingresar
    public function index()
    {
        return view('home');
    }

//funcion que lleva a la vista del mapa del sitio
    public function mapa()
    {
        return view('mapa');
    }
}
