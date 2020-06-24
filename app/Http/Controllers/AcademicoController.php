<?php

namespace App\Http\Controllers;

use App\academico;
use App\departamento;
use App\facultad;
use App\secFacultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Controlador para los academicos
class AcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //En index se obtiene el listado completo de academicos y se paginan de 10. Se va hacia la vista de blade, de manera diferente dependiendo del rol de usuario
     public function index()
     {
       $academicos = Academico::latest()->paginate(10);
       if(@Auth::user()->hasRole('SecFacultad')){    //si es un secretario de Facultad, se pasan tambien los dptos que coinciden con la facultad del usuario actual
         $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
         $departamentos = Facultad::find($CodigoFacultad)->departamentos;
         return view('academicos.index',compact('academicos'),['departamentos' => $departamentos])
           ->with('i',(request()->input('page',1)-1)*5);
       }
       else{   //sino, no es necesario pasar mas parametros
         return view('academicos.index',compact('academicos'))
           ->with('i',(request()->input('page',1)-1)*5);
       }
     }

    //funcion indexelim que funciona igual que index, pero en este caso con onlyTrashed, para consultar solo academicos eliminados logicamente
    public function indexelim()
    {
      $academicos = Academico::onlyTrashed()->latest()->paginate(10);
      if(@Auth::user()->hasRole('SecFacultad')){
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $departamentos = Facultad::find($CodigoFacultad)->departamentos;
        return view('academicos.index',compact('academicos'),['departamentos' => $departamentos])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        return view('academicos.index',compact('academicos'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  //funcion crear, que luego lleva a la vista para la creacion
    public function create()
    {
        $departamentos = Departamento::all();
        $secFacultades = SecFacultad::all();
        return view('academicos.create',['departamentos' => $departamentos],['secFacultades' => $secFacultades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  //funcion store, donde se validan los datos recibidos en el blade para crear, y si esta todo correcto se guarda el nuevo registro
    public function store(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:academicos'],
        'verificador' => ['required','max:1'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => ['required','integer'],
        'Categoria' => 'required',
        'HorasContrato' => ['required','integer','min:0','max:44'],
        'TipoPlanta' => 'required',
      ]);
      Academico::create($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        Academico::destroy($request['id']);
      }
      return redirect()->route('academicos.index')
        ->with('success','Academico creado exitosamente.');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */

     //funcion show, que muestra los datos de un registro en especifico
    public function show(Academico $academico)
    {
      return view('academicos.show',compact('academico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */

     //funcion editar, que luego lleva a la vista para recibir los datos
    public function edit($id)
    {
      $academico = academico::find($id);
      $departamentos = Departamento::all();
      $secFacultades = SecFacultad::all();
      return view('academicos.edit',compact('academico'),['departamentos' => $departamentos,'secFacultades' => $secFacultades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */

  //los datos recibidos en academico.create son validados con la funcion store
    public function update(Request $request, $id)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:academicos'],
        'verificador' => ['required','max:1'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => ['required','integer'],
        'Categoria' => 'required',
        'HorasContrato' => ['required','integer','min:0','max:44'],
        'TipoPlanta' => 'required',
      ]);
      $academico = academico::find($id);    //si todo es valido, se busca el registro a actualizar y se hacen los cambios
      $academico->update($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        Academico::destroy($id);
      }
      return redirect()->route('academicos.index')
        ->with('success','Academico Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */

     //funcion para eliminar, realiza la busqueda y luego hace eliminado logico (soft)
    public function destroy($id)
    {
      $academico = academico::find($id);
      $academico->delete();
      return redirect()->route('academicos.index')
        ->with('success','Academico Eliminado Exitosamente');
    }

    public function reactivar($id)
    {
      $academico = academico::onlyTrashed()->find($id);
      $academico->restore();
      return redirect()->route('academicos.index')
        ->with('success','Academico Reactivado Exitosamente');
    }
}
