<?php

namespace App\Http\Controllers\Curriculum;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCurriculum;
use App\Models\Carrera;
use App\Models\Curriculum;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;


class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = [
            'title' => 'Hoja de Vida Estudiantes',
        ];
        $datas = Curriculum::orderBy('id', 'asc')->get();

        $grado_academico = [
            ['grado_academico' => ['id' => 0, 'nombre' => 'Técnico']],
            ['grado_academico' => ['id' => 1, 'nombre' => 'Tecnólogo']],
            ['grado_academico' => ['id' => 2, 'nombre' => 'Profesional']]

        ];
        $degree = Arr::pluck($grado_academico,'grado_academico.nombre');



        return view('curriculum.index', compact('datas', 'titulo', 'degree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = [
            'title' => 'Hoja de Vida Estudiantes',
        ];
        // Arreglo para comparar opciones con la base de datos, así evitar el uso de "IF" innecesariamente 
        $sexo = [
            ['sexo' => ['id' => 0, 'nombre' => 'Hombre']],
            ['sexo' => ['id' => 1, 'nombre' => 'Mujer']]

        ];
        //Ordenación y generación del arreglo según el nombre
        $gender = Arr::pluck($sexo, 'sexo.nombre');

        // La lógica de los arreglos se repite
        $grado_academico = [
            ['grado_academico' => ['id' => 0, 'nombre' => 'Técnico']],
            ['grado_academico' => ['id' => 1, 'nombre' => 'Tecnólogo']],
            ['grado_academico' => ['id' => 2, 'nombre' => 'Profesional']]

        ];
        $degree = Arr::pluck($grado_academico, 'grado_academico.nombre');

        // La lógica de los arreglos se repite
        $disponibilidad = [
            ['disponibilidad' => ['id' => 0, 'nombre' => 'No Disponible']],
            ['disponibilidad' => ['id' => 1, 'nombre' => 'No Registra']],
            ['disponibilidad' => ['id' => 2, 'nombre' => 'Pasante']],
            ['disponibilidad' => ['id' => 3, 'nombre' => 'Disponible']],
        ];
        $available=Arr::pluck($disponibilidad, 'disponibilidad.nombre');

        // La lógica de los arreglos se repite
        $recomendado = [
            ['recomendado' => ['id' => 0, 'nombre' => 'No']],
            ['recomendado' => ['id' => 1, 'nombre' => 'Si']],
        ];
        $recomended = Arr::pluck($recomendado, 'recomendado.nombre');

        // La lógica de los arreglos se repite
        $parentesco = [
            ['parentesco' => ['id' => 0, 'nombre' => 'Hij@']],
            ['parentesco' => ['id' => 1, 'nombre' => 'Sobrin@']],
            ['parentesco' => ['id' => 2, 'nombre' => 'Niet@']],
            ['parentesco' => ['id' => 3, 'nombre' => 'Familiar']],
            ['parentesco' => ['id' => 4, 'nombre' => 'Otro']],
        ];
        $relationship = Arr::pluck($parentesco, 'parentesco.nombre');

        // La lógica de los arreglos se repite
        $planta = [
            ['planta' => ['id' => 0, 'nombre' => 'Riopaila']],
            ['planta' => ['id' => 1, 'nombre' => 'Castilla']],
            ['planta' => ['id' => 2, 'nombre' => 'Ambas']],
        ];
        $plant = Arr::pluck($planta, 'planta.nombre');

        $carreras=Carrera::orderBy('id')->get();
        $empleados=Empleado::orderBy('id')->get();
        return view('curriculum.create', compact(
            'titulo',
            'carreras',
            'empleados',
            'gender',
            'available',
            'degree',
            'recomended',
            'relationship',
            'plant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionCurriculum $request)
    {
        Curriculum::create($request->all());

        $curriculun = new Curriculum;
        $curriculun = [
            'email' => $request->email,
            'nombre' => $request->nombre,
        ];
        Mail::send('emails.curriculum', $curriculun, function ($message) use ($curriculun) {
            $message->from('cesarzc95@gmail.com');
            $message->to($curriculun['email']);
            $message->subject('Pruebas');
        });


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
        // Titulo para mostrar en el template, se envía a través de la variable $titulo
        $titulo = [
            'title' => 'Hoja de Vida Estudiantes',
        ];
        // Se crea arreglo en la variable $sexo con el objetivo de comparar los datos del arreglo versus la información de la tupla curriculum
        $sexo = [

            ['sexo' => ['id' => 0, 'nombre' => 'Hombre']],
            ['sexo' => ['id' => 1, 'nombre' => 'Mujer']],
        ];
        // Los datos de la variable $sexo los proceso en la variable $gender para convertirlos en un arreglo JSON y ordenarlos por el nombre
        // Mediante la función pluck listo los datos de manera que se muestre el nombre en el recorrido que se hará en el template
        $gender = Arr::pluck($sexo, 'sexo.nombre');

        // La lógica de los arreglos se repite
        $grado_academico = [
            ['grado_academico' => ['id' => 0, 'nombre' => 'Técnico']],
            ['grado_academico' => ['id' => 1, 'nombre' => 'Tecnólogo']],
            ['grado_academico' => ['id' => 2, 'nombre' => 'Profesional']]

        ];
        $degree = Arr::pluck($grado_academico, 'grado_academico.nombre');
       
        // La lógica de los arreglos se repite
        $disponibilidad = [
            ['disponibilidad' => ['id' => 0, 'nombre' => 'No Disponible']],
            ['disponibilidad' => ['id' => 1, 'nombre' => 'No Registra']],
            ['disponibilidad' => ['id' => 2, 'nombre' => 'Pasante']],
            ['disponibilidad' => ['id' => 3, 'nombre' => 'Disponible']],
        ];
        $available=Arr::pluck($disponibilidad, 'disponibilidad.nombre');
        
        // La lógica de los arreglos se repite
        $recomendado = [
            ['recomendado' => ['id' => 0, 'nombre' => 'No']],
            ['recomendado' => ['id' => 1, 'nombre' => 'Si']],
        ];
        $recomended = Arr::pluck($recomendado, 'recomendado.nombre');

        // La lógica de los arreglos se repite
        $parentesco = [
            ['parentesco' => ['id' => 0, 'nombre' => 'Hij@']],
            ['parentesco' => ['id' => 1, 'nombre' => 'Sobrin@']],
            ['parentesco' => ['id' => 2, 'nombre' => 'Niet@']],
            ['parentesco' => ['id' => 3, 'nombre' => 'Familiar']],
            ['parentesco' => ['id' => 4, 'nombre' => 'Otro']],
        ];
        $relationship = Arr::pluck($parentesco, 'parentesco.nombre');
        
        // La lógica de los arreglos se repite
        $planta = [
            ['planta' => ['id' => 0, 'nombre' => 'Riopaila']],
            ['planta' => ['id' => 1, 'nombre' => 'Castilla']],
            ['planta' => ['id' => 2, 'nombre' => 'Ambas']],
        ];
        $plant = Arr::pluck($planta, 'planta.nombre');




        $data = Curriculum::findOrFail($id);
        $carreras=Carrera::orderBy('id')->get();
        $empleados=Empleado::orderBy('id')->get();
        return view('curriculum.edit', compact(
            'titulo',
            'data',
            'carreras',
            'empleados',
            'gender',
            'degree',
            'available',
            'recomended',
            'relationship',
            'plant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionCurriculum $request, $id)
    {
        Curriculum::findOrFail($id)->update($request->all());
        return redirect('curriculum')->with('message', 'Curriculum actualizado exitosamente.');
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
