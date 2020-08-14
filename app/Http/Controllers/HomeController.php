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

    public function index()
    {
        return view('home');
    }

    public function mapa()
    {
        return view('mapa');
    }
}
