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

//En index se obtiene el listado completo de academicos y se paginan de 10. Se va hacia la vista de blade, de manera diferente dependiendo del rol de usuario
     public function index()
     {
       if(@Auth::user()->hasRole('SecFacultad')){    //si es un secretario de Facultad, se pasan solo los academicos de esta facultad
         $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
         $academicos = Academico::orderBy('ApellidoPaterno', 'ASC')->where('CodigoFacultad',$CodigoFacultad)->latest()->paginate(10);
         return view('academicos.index',compact('academicos'))
            ->with('i',(request()->input('page',1)-1)*5);
       }
       else{   //sino, se pasan todos
         $academicos = Academico::orderBy('ApellidoPaterno', 'ASC')->latest()->paginate(10);
         return view('academicos.index',compact('academicos'))
           ->with('i',(request()->input('page',1)-1)*5);
       }
     }

//funcion indexelim que funciona igual que index, pero en este caso con onlyTrashed, para consultar solo academicos eliminados logicamente
    public function indexelim()
    {
      if(@Auth::user()->hasRole('SecFacultad')){  //si es sec de facultad se muestran solo los propios, sino se pasan todos
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $academicos = Academico::orderBy('ApellidoPaterno', 'ASC')->where('CodigoFacultad',$CodigoFacultad)->onlyTrashed()->latest()->paginate(10);
        $departamentos = Facultad::find($CodigoFacultad)->departamentos;  //se pasan tambien los dptos de la facultad
        return view('academicos.index',compact('academicos'),['departamentos' => $departamentos])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        $academicos = Academico::orderBy('ApellidoPaterno', 'ASC')->onlyTrashed()->latest()->paginate(10);
        return view('academicos.index',compact('academicos'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//funcion crear, que luego lleva a la vista para la creacion
    public function create()
    {
        $departamentos = Departamento::all();
        $secFacultades = SecFacultad::all();
        return view('academicos.create',['departamentos' => $departamentos],['secFacultades' => $secFacultades]);
    }

//funcion store, donde se validan los datos recibidos en el blade para crear, y si esta todo correcto se guarda el nuevo registro
    public function store(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:academicos'],
        'verificador' => ['required','max:1'],
        'Nombres' => 'required',
        'ApellidoPaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => ['required','integer'],
        'Categoria' => 'required',
        'HorasContrato' => ['required','integer','min:0','max:44'],
        'TipoPlanta' => 'required',
      ]);
      $departamento = departamento::find($request['CodigoDpto']);
      $request['CodigoFacultad']=$departamento->CodigoFacultad;
      Academico::create($request->all());
      if ($request['deleted_at'] == "Inactivo"){  //si se crea como inactivo, se le hace eliminacion logica
        Academico::destroy($request['id']);
      }
      return redirect()->route('academicos.index')
        ->with('success','Academico creado exitosamente.');
    }

//funcion show, que muestra los datos de un registro en especifico
    public function show(Academico $academico)
    {
      return view('academicos.show',compact('academico'));
    }

//funcion editar, que luego lleva a la vista para recibir los datos
    public function edit(Academico $academico)
    {
      $departamentos = Departamento::all();
      $secFacultades = SecFacultad::all();
      return view('academicos.edit',compact('academico'),['departamentos' => $departamentos,'secFacultades' => $secFacultades]);
    }

//los datos recibidos en academico.create son validados con la funcion store
    public function update(Request $request, $id)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000'],
        'verificador' => ['required','max:1'],
        'Nombres' => 'required',
        'ApellidoPaterno' => 'required',
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

//segunda funcion update, es usada por el administrador que puede editar solo a que dpto pertenece el academico
    public function update2(Request $request, $id)
    {
      $academico = academico::find($id);    //si todo es valido, se busca el registro a actualizar y se hacen los cambios
      $departamento = departamento::find($request['CodigoDpto']);
      $request['CodigoFacultad']=$departamento->CodigoFacultad;
      $academico->update($request->all());
      return redirect()->route('academicos.index')
        ->with('success','Academico Actualizado Exitosamente');
    }

//funcion para eliminar, realiza la busqueda y luego hace eliminado logico (soft)
    public function destroy($id)
    {
      $academico = academico::find($id);
      $academico->delete();
      return redirect()->route('academicos.index')
        ->with('success','Academico Eliminado Exitosamente');
    }

//funcion para reactivar un academico que fue eliminado
    public function reactivar($id)
    {
      $academico = academico::onlyTrashed()->find($id);
      $academico->restore();
      return redirect()->route('academicos.index')
        ->with('success','Academico Reactivado Exitosamente');
    }
}
