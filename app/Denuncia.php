<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
	protected $table = "denuncia";

	protected $fillable = ['foto', 'tipoDenuncia', 'contenidoDenuncia', 'fechaHora', 'ubicacion', 'IdUsuario'];

	public function usuarios() {
		return $this->belongsTo('App\Usuario');
	}

	public function presCulpable() {
		return $this->hasMany('App\PresCulpables');
	}

}
