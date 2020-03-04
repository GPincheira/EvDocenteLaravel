@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>RUT:</strong>
                      <input type="integer" name="id" value="{{ $user->id }}" class="form-control" placeholder="Ingrese el RUT">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Verificador:</strong>
                      <input type="text" name="verificador" value="{{ $user->verificador }}" class="form-control" placeholder="Ingrese el verificador">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nombre:</strong>
                      <input type="text" name="Nombre" value="{{ $user->Nombre }}" class="form-control" placeholder="Ingrese Nombre">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Apellido Paterno:</strong>
                      <input type="text" name="ApellidoPaterno" value="{{ $user->ApellidoPaterno }}" class="form-control" placeholder="Ingrese Apellido Paterno">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Apellido Materno:</strong>
                      <input type="text" name="ApellidoMaterno" value="{{ $user->ApellidoMaterno }}" class="form-control" placeholder="Ingrese Apellido Materno">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Email:</strong>
                      <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Ingrese el email">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Tipo de Usuario:</strong>
                      <select name="TipoUsuario" class="form-control">
                        <option value="Administrador">Administrador</option>
                        <option value="SecFacultad">Secretario de Facultad</option>
                        <option value="Secretario">Secretario</option>
                      </select>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Estado:</strong>
                      <select name="Estado" class="form-control">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option value="{{ $user->Estado }}">
                      </select>
                  </div>
              </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
