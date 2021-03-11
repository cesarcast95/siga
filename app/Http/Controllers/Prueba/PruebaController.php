<?php

namespace App\Http\Controllers\Prueba;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Prueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = [
            'title' => 'Resultados Pruebas',
        ];
        // Paginate lista los datos en grupos de "n" números
        $datas = Prueba::with('curriculum.carrera:id,programa,institucion')->orderBy('id', 'asc')->get();

        return view('pruebas.index', compact('titulo', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = [
            'title' => 'Resultados Pruebas',
        ];

        $curriculum = Curriculum::orderBy('id', 'asc')->get();

        return view('pruebas.create', compact('titulo', 'curriculum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function envioPrueba(Request $request)
    {
       
        $curriculum = Curriculum::where('estado_prueba', 1)->get();
        // dd($curriculum);
        foreach ($curriculum as $curriculum){
                $array = [
                    "email" => $curriculum->email,
                    "nombre" => $curriculum->nombre,
                ];
                // Envio correo segun profesion
                /* if ($curriculum->grado_academico == 0 | $curriculum->grado_academico ==1) {
                    Mail::send('emails.tecnologo', $array, function ($message) use ($array) {
                        $message->from('cesarzc95@gmail.com');
                        $message->to($array['email']);
                        $message->subject('Subject');
                    });
                } else {
                    Mail::send('emails.profesional', $array, function ($message) use ($array) {
                        $message->from('cesarzc95@gmail.com');
                        $message->to($array['email']);
                        $message->subject('Subject');
                    });
                } */
               
        Mail::send('emails.tecnologo', $array, function ($message) use ($array) {
            $message->from('cesarzc95@gmail.com');
            $message->to($array['email']);
            $message->subject('Subject');
        });
              
                
        $curriculum->estado_prueba = 0;
        $curriculum->save();


        $prueba = new Prueba;
        $prueba->estado_envio=1;
        $prueba->save($request->all());
        }

        //Prueba::create($request->all());

       // $prueba = Prueba::get();

        
        return redirect()->back();
    } 

public function CesarGuardar(Request $request)
{

    $validate = $request->validate([
        '_token'        => 'required',
        'curriculum_id'  => 'required',
        'psicometria_ratio' => 'required',
        'psicometria_descripcion' => 'required',
        'competencias_ratio' => 'required',
        'competencias_descripcion' => 'required'

    ]);

    if(!isset($validate)){
        $respuesta['status']='error';
        $respuesta['codigo']=0;
        $respuesta['respuesta']='Error Post';
        $respuesta['errorDetail'] = array($validate->errors());
    }else{
        $respuesta['respuesta']='Proceso finalizado';
        $respuesta['status']='success';
        $respuesta['codigo']=1; 
        $curriculum = Curriculum::find((int)$request->get('curriculum_id'));
       
      
       
        $curriculum->estado_prueba = 1;
        $curriculum->save();
       
        $curriculum = Curriculum::where('estado_prueba', 1)->get();
        $respuesta['curriculum']=$curriculum;

        $prueba = Prueba::get();
        $respuesta['prueba']=$prueba;


    
    }

    if($respuesta['codigo']==0){
        return response()->json($respuesta,400);
    }else{
        return response()->json($respuesta,200);
    }  
    
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
            $prueba = Prueba::find($id);
            if (!is_null($prueba)) {
               $prueba->resultado = $request->input('resultado');
               $prueba->save();
               return response()->json([
                'response' => true,
                'message' => 'Candidato Apto!',
                'message_no' => 'Candidato NO Apto!',
                'type' => $request->resultado,
               ]);
            } 
            
            return response()->json([
                'response' => false,
                'message' => 'Ha ocurrido un error, intente de nuevo.',
            ]);
        } 
    }


}
