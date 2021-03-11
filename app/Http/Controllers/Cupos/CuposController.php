<?php

namespace App\Http\Controllers\Cupos;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Cupos;
use App\Models\Empleado;
use App\Models\Empresa;
use Illuminate\Http\Request;


use function GuzzleHttp\Promise\all;

class CuposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = [
            'title' => 'Cupos',
        ];
        /* El with busca los campos exactos a buscar y no recorre toda la tabla completa, así la búqueda se optimiza,
        así se optimiza los tiempos de búsquedas y la página cargará más rápido */
        $seleccion = Cupos::with('area:id,area', 'empleado:id,nombre')->orderBy('id', 'asc')->get();

        return view('cupos.index', compact('seleccion', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Titulo de el template crear
        $titulo = [
            'title' => 'Pruebas Estudiantes',
        ];
        // Se declaran las variables utilizadas en el apartado proceso de seleccion
        $area = Area::orderBy('id', 'asc')->get();
        $empleado = Empleado::orderBy('id', 'asc')->get();
        $empresa = Empresa::orderBy('id', 'asc')->get();

        return view('cupos.create', compact('area','empleado', 'titulo', 'empresa'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cupos::create($request->all());
        return redirect()->back();
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
         // Titulo de el template editar
         $titulo = [
            'title' => 'Pruebas Estudiantes',
        ];
        $data = Cupos::findOrFail($id);
        $area = Area::orderBy('id', 'asc')->get();
        $empleado = Empleado::orderBy('id', 'asc')->get();

        return view('cupos.edit', compact('data', 'titulo', 'area', 'empleado'));
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
        Cupos::findOrFail($id)->update($request->all());
        return redirect('seleccion')->with('message', 'Proceso de Selección actualizado exitosamente.');
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
}
