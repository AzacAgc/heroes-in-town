<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
    	return view('access.registro');
    }

    public function registro(Request $request)
    {
    	$this->validar($request);
    	User::create($request->all());

    	return redirect('/')->with('Status', 'Te has registrado');
    }

    public function validar($request)
    {
    	return $this->validate($request, [
							'name'     =>  'required|max:255',
							'email'    => 'required|unique:users|email|max:255',
							'password' => 'required|confirmed|max:255',
				    ]);
    }
}
