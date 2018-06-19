<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\PresCulpable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Manipulación de imagenes
        if ( $request->hasFile('foto') ) {
            $archivo = $request->file('foto');
            $nameImage = 'heroes_denuncia_' .time(). '.' .$archivo->getClientOriginalExtension();
            $ruta = public_path().'\imagenes\denuncias';
            $archivo->move($ruta, $nameImage);
        } else {
            $nameImage = null;
        }//end if

        $denuncia = new Denuncia( $request->all() );
        $denuncia->IdUsuario = \Auth::user()->id;
        $denuncia->foto = $nameImage;

        // Fecha & hora
        $fecha = $request->fecha_submit;
        $hora = $request->hora;
        // Acomodar fecha
        $ampm = substr($hora, -2);
        if ( strnatcasecmp($ampm, 'am') == 0 ) {
            $fullHora = substr($hora, 0, -2) . ":00";
        } else if ( strnatcasecmp($ampm, 'pm') == 0 ) {
            $HH = ( substr($hora, 0, 2) ) + 12 ;
            $MM = substr($hora, 3, 2);
            $fullHora = $HH.":".$MM.":00";
        }
        $fechaHora = $fecha ." ". $fullHora;

        $denuncia->fechaHora = $fechaHora;

        $denuncia->save();

        if ( !is_null($request->nombreAlias) || !is_null($request->domicilio) || !is_null($request->descFisica) || $request->hasFile('pcFoto') ) {

            $prescul = new PresCulpable($request->all());

            if ( $request->hasFile('pcFoto') ) {
                $archivo = $request->file('pcFoto');
                $fotoCulp = 'heroes_denuncia_presculp_' .time(). '.' .$archivo->getClientOriginalExtension();
                $ruta = public_path().'\imagenes\denuncias\fotosPresCulp';
                $archivo->move($ruta, $fotoCulp);

                $prescul->fotoPc = $fotoCulp;
            } else {
                $prescul->fotoPc = null;
            }//end if else

            $prescul->denuncias()->associate($denuncia);

            $prescul->save();
        }// if - pres culp

        flash()->overlay('¡Su denuncia ha sido registrada con exito!
            <br><br>
            <strong>¡Gracias! por ayudar.</strong>', 'Denuncia creada');

        return redirect()->route('inicio');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function denuncias()
    {
        $denuncias = DB::table('denuncia')->select('tipoDenuncia', 'contenidoDenuncia', 'fechaHora', 'ubicacion')->get();

        return response()->json($denuncias);
    }

    public function estadisticas()
    {
        $est = DB::table('denuncia')->select('tipoDenuncia')->get();

        return response()->json($est);
    }

    public function denUsuario()
    {
        $ID = \Auth::user()->id;

        $cant = DB::table('denuncia')
                    ->select(DB::raw('tipoDenuncia'))
                    ->where('IdUsuario', '=', $ID)
                    ->get();

        return response()->json($cant);
    }
}
