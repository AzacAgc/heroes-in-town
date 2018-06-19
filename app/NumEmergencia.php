<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumEmergencia extends Model
{
	protected $table = "numemergencia";

	protected $fillable = ['nombreDependencia', 'telefono'];

}
