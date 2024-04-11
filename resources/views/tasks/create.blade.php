@extends('layouts.app')

@section('content')
<br>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert"">
        <strong>Ups Ocurrio un Error!</strong>..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">

        <div class="card-body">
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-center">Crear Tarea</h2>
        </div>


    </div>

    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción..." ></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" id="" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="status" class="form-select" id="" >
                        <option value="">-- Elige el status --</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Completada">Completada</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <br>
                <button class="btn btn-primary" type="submit">Crear</button>
              </div>
        </div>
    </form>
</div>

</div>
</div>

</div>
@endsection