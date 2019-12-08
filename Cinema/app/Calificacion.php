<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "movies_cal";
    protected $fillable = ['id_movie','valor','email'];

}
