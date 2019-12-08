<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Calificacion;
use Cinema\Http\Requests\CalificacionCreateRequest;
use Illuminate\Routing\Route;
use Cinema\Movie;
use Cinema\Genre;

/**
    Controlador de las calificaciones

**/
class CalificacionController extends Controller
{

	public function __construct(){        
		$this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

	public function find(Route $route){
        $this->calificacion = Calificacion::find($route->getParameter('calificacion'));
	}

    /**
     * Crea una calificacion
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calificacion = Calificacion::lists('calificacion', 'id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificacionCreateRequest $request)
    {
		Calificacion::create($request->all());
		$movies = Movie::Movies();
        return view('index',compact('movies'));
    }

    /**
     * Lista las calificaciones por genero, recibe un parametro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) 
    {
        $idGenero = $request->input('genre_id');
        $movies = Movie::TopMovies($idGenero);
        $genres = Genre::lists('genre', 'id');
        return view('top',compact('movies', 'genres'));
    }
   
}
