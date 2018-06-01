<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Users;
use App\Tickets;
use App\Search;
use App\Groups;
use App\Incremental;
use App\SatisfactionRatings;
use App\Zendesk\AppZendesk;
use App\User;

class SurveniaWebPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        return view('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terminos(Request $request)
    {
        return view('terminos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto(Request $request)
    {
        return view('contacto');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function plantillas(Request $request)
    {
        return view('plantillas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function misEncuestas(Request $request)
    {
        return view('mis_encuestas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEncuestas(Request $request)
    {
        return view('crear_encuesta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEncuesta(Request $request)
    {
        return view('crear_encuesta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearEncuesta2(Request $request)
    {
        return view('crear_encuesta2');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articulos(Request $request)
    {
        return view('articulos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encuestasPublicas(Request $request)
    {
        return view('encuestas_publicas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encuestasPublicasDetalle(Request $request)
    {
        return view('encuestas_publicas_detalle');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comoFunciona(Request $request)
    {
        return view('como_funciona');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculadora(Request $request)
    {
        return view('calculadora');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function planes(Request $request)
    {
        return view('planes');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registro(Request $request)
    {
        return view('registro');
    }



}



