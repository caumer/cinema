<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Movie extends Model
{
    protected $table = "movies";
    protected $fillable = ['name','path','cast','direction','duration','genre_id'];

    public function setPathAttribute($path){
    	if(! empty($path)){
			$name = Carbon::now()->second.$path->getClientOriginalName();
			$this->attributes['path'] = $name;
			\Storage::disk('local')->put($name, \File::get($path));
    	}
	}

	public static function Movies(){
		return DB::table('movies')
			->join('genres','genres.id','=','movies.genre_id')
			->select('movies.*', 'genres.genre')
			->get();
	}

// metodo que busca en la base de datos las peliculas por genero mostrando las 5 primeras
	public static function TopMovies($idGenero){
		return DB::select('select movies.*, genres.genre, ROUND(avg(movies_cal.valor),1) as valor from movies inner join genres on movies.genre_id = genres.id
		inner join movies_cal on movies_cal.id_movie = movies.id AND genres.id = :id_genero group by genres.genre, movies.id
		ORDER BY ROUND(avg(movies_cal.valor),1) desc LIMIT 5', ['id_genero' => $idGenero]);
	}
}
