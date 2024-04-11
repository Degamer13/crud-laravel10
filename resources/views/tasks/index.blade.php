@extends('layouts.app')

@section('content')
<br>
<div class="container">

<div class="row">
 
            <div class="col-6">
              <a href="{{ route('tasks.create') }}" class="btn btn-primary" >Crear tarea</a>
            </div>
            <div class="col-6">
             
            <form class="">
			     
                <div class="input-group mb-3" >
            <input type="text" class="form-control"   name="buscarpor" value="{{$buscarpor}}"   type="search" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-success"  id="button-addon2" type="submit">Buscar</button>
            </div>
          </div>
            </form>
 
    
    </div>


    @if (Session::get('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"">
        <strong>{{Session::get('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
    <div class="col-12 mt-4">
        <table class="table table-hover  text-center">
            <thead class="table-primary" >

                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>

        </thead>
            @foreach ( $tasks as $task )
            <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    {{$task->due_date}}
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{$task->status}}</span>
                </td>
                <td>
                    <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-primary">Editar</a>

                    <form action="{{route('tasks.destroy', $task)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
        <!-- Centramos la paginacion a la derecha -->
        <div class="pagination justify-content-end">
            {!! $tasks->links() !!}
          </div>
</div>
</div>
</div>
@endsection
