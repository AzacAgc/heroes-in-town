<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
	protected $table = "notificacion";

	protected $fillable = ['fechaHora', 'contenidoNotificacion', 'IdUsuario'];

	public function usuarios() {
		return $this->belongsTo('App\Usuario');
	}

}
