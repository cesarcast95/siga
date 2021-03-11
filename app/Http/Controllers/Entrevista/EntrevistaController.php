<?php

namespace App\Http\Controllers\Entrevista;

use App\Http\Controllers\Controller;
use App\Models\Cupos;
use App\Models\Entrevista;
use App\Models\Prueba;
use App\Models\Seleccion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class EntrevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = [
            'title' => 'Pruebas Estudiantes',
        ];

        $entrevistas = Entrevista::with('cupos.empleado:id,nombre', 'cupos.area:id,area', 'prueba.curriculum:id,nombre,cedula')->orderBy('fecha_entrevista')->get();
        return view('entrevista.index', compact('titulo', 'entrevistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = [
            'title' => 'Entrevista',
        ];
        /* 1) La función withCount permitirá saber Cuántas veces esta seleccion en la tabla entrevista
         con un valor del estado Verdadero (1), y eso nos da la cantidad de veces que ese 
        procso de selección está siendo llamado en una entrevista; si la entrevista fue rechazada, devuelve que no está seleccionado,
         es decir, 0 veces.
        
        2) Decir si la cantidad de veces que está Entrevistado en ese procso de selección es igual o mayor que la cantidad de procesos de selección, 
        entonces hacer un filtro que no me devuelva más veces el proceso de selección.
        Mostrar Procesos de Selección que la cantidad sea mayor que la cantidad de Entrevistas*/
        $cupos = Cupos::withCount(['entrevistas' => function (Builder $query){
            $query->where('estado', 1);
        }])->get()->filter(function ($item, $key){
            return  $item->cantidad_cupos > $item->entrevistas_count;
        })->all();

        $prueba = Prueba::where('resultado', '=', 1)->get();

        return view('entrevista.create', compact('titulo','cupos', 'prueba'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Se guarda el la entrevista a través de la relación */

        Entrevista::create($request->all());
        return redirect()->route('entrevista')->with('message', 'Entrevista Realizada con Éxito');
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

    public function postComplete(Request $request, $id)
    {
        
 
        if ($request->ajax()) {
            $entrevista = Entrevista::find($id);
            if (!is_null($entrevista)) {
               $entrevista->estado = $request->input('estado');
               $entrevista->save();
               return response()->json([
                'response' => true,
                'message' => 'Candidato Seleccionado!',
                'message_no' => 'Candidato NO Seleccionado!',
                'type' => $request->estado,
               ]);
            } 
            
            return response()->json([
                'response' => false,
                'message' => 'Ha ocurrido un error, intente de nuevo.',
            ]);
        } 
    }

}
