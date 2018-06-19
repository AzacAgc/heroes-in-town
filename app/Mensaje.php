<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
	protected $table = "mensaje";

	protected $fillable = ['emisor', 'IdUsuario', 'contenidoMensaje', 'fechaHora'];

	public function usuarios() {
		return $this->belongsTo('App\Usuario');
	}

}
