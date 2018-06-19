<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresCulpable extends Model
{
	protected $table = "presculpable";

	protected $fillable = ['nombreAlias', 'domicilio', 'descFisica', 'fotoPc', 'denuncias_id'];

	public function denuncias() {
		return $this->belongsTo('App\Denuncia');
	}

}
