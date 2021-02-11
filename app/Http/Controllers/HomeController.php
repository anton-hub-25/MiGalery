<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    //Metodo que retorna la vista "plantilla" que se muestra despues de logearse al sistema.
    public function index()
    {
       //return view('home');
         return view('layouts.admin');
    }
}
