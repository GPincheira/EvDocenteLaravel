<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evaluacion;

//Controlador Home, que incluye el index hacia la vista donde se ingresa una vez que se inicia la sesion
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
