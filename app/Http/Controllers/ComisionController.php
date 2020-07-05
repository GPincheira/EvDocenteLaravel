<?php

namespace App\Http\Controllers;

use App\comision;
use App\facultad;
use App\secFacultad;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//En index se obtiene el listado completo de comisiones y se paginan de 10. Se va hacia la vista de blade
    public function index()
    {
      $comisiones = Comision::latest()->paginate(10);
      $activa = Comision::where('Estado', '=', 'Activo')
                ->where('Año', '=', date("Y"))
                ->where('CodigoFacultad', '=', @Auth::user()
                ->secFacultad->CodigoFacultad)
                ->first();
      return view('comisiones.index',compact('comisiones'),['activa' => $activa])
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comisiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  //funcion para validar los datos ingresados para la comision, y si esta todo en orden crea el registro
    public function store(Request $request)
    {
      $secFacultad = secFacultad::find(@Auth::user()->id);
      $facultad = facultad::find($secFacultad->CodigoFacultad);
      $request->validate([
        'Año' => ['required','integer','min:2000','max:2100'],
        'Fecha' => ['required'],
        'Nombre1' => 'required',
        'APaterno1' => 'required',
        'AMaterno1' => 'required',
        'Nombre2' => 'required',
        'APaterno2' => 'required',
        'AMaterno2' => 'required',
        'Estado' => 'required',
      ]);
      $request['CodigoFacultad']=$facultad->id; //se le asignan varios campos de la facultad a la comision que se crea
      $request['NombreDecano']= $facultad->DecanoNombre;
      $request['APaternoDecano']= $facultad->DecanoAPaterno;
      $request['AMaternoDecano']= $facultad->DecanoAMaterno;
      $request['idSecFacultad']= @Auth::user()->id;   //asi como tambien campos del secretario de facultad
      $request['NombreSecFac']= @Auth::user()->Nombre;
      $request['APaternoSecFac']= @Auth::user()->ApellidoPaterno;
      $request['AMaternoSecFac']= @Auth::user()->ApellidoMaterno;
      if ($request['Estado'] == "Activo"){
        $comisiones = Comision::all();
        foreach ($comisiones as $comision){
          if($comision->Año == $request['Año'] && $comision->CodigoFacultad == @Auth::user()->SecFacultad->CodigoFacultad){
              $comision->Estado = "Inactivo";
              $comision->save();
          }
        }
      }
      Comision::create($request->all());
      return redirect()->route('comisiones.index')
        ->with('success','Comision creada exitosamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */

    public function show(Comision $comision)
    {
      return view('comisiones.show',compact('comision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comision = comision::find($id);
      return view('comisiones.edit',compact('comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */

  //funcion que valida los datos para editar, y si esta todo en orden, realiza los cambios
    public function update(Request $request, $id)
    {
      $request->validate([
        'Año' => ['required','year'],
        'Fecha' => ['required','timedate'],
        'Nombre1' => 'required',
        'Nombre2' => 'required',
        'AMaterno1' => 'required',
        'APaterno2' => 'required',
        'Estado' => 'required',
      ]);
      if ($request['Estado'] == "Activo"){
        $comisiones = Comision::all();
        foreach ($comisiones as $comision){
          if($comision->Año == $request['Año'] && $comision->CodigoFacultad == @Auth::user()->SecFacultad->CodigoFacultad){
              $comision->Estado = "Inactivo";
              $comision->save();
          }
        }
      }
      $comision = comision::find($id);
      $comision->update($request->all());
      return redirect()->route('comisiones.index')
        ->with('success','Comision Actualizada Exitosamente');
    }

    public function activaunica($id)
    {
      $nuevaact = comision::find($id);
      $comisiones = Comision::all();
      foreach ($comisiones as $comision){
        if($comision->Año == $nuevaact->Año && $comision->CodigoFacultad == @Auth::user()->SecFacultad->CodigoFacultad){
            $comision->Estado = "Inactivo";
            $comision->save();
        }
      }
      $nuevaact->Estado = "Activo";
      $nuevaact->save();
      return redirect()->route('comisiones.index')
        ->with('success','Comision Activada Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */

  //funcion que elimina un registro (soft)
    public function destroy($id)
    {
      $comision = comision::find($id);
      $comision->delete();
      return redirect()->route('comisiones.index')
        ->with('success','Comision Eliminada Exitosamente');
    }
}
