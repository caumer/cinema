<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Movie;
use Cinema\Genre;
use Cinema\Calificacion;
use Cinema\Http\Requests\CalificacionCreateRequest;

class FrontController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['only' => 'admin']);
  }

   public function index(){
     $movies = Movie::Movies();
     return view('index',compact('movies'));
   }

   public function top($idGenero = 0){
    $movies = Movie::TopMovies($idGenero);
    $genres = Genre::lists('genre', 'id');
    return view('top',compact('movies', 'genres'));
   }

   public function login(){
      return view('login');
   }

   public function admin(){
      return view('admin.index');
   }
}
