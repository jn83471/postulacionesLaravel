@extends("../../templates/header")

@section('content')

    <p>Nombre: {{$puestos->display_name}}</p>
    <p>
    Estatus: 
    @if ($puestos->Estatus==0)
        Activo
    @else
        Desactivado
    @endif
            
    <form action="{{route("puestos.update",[$puestos->id])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }} 
        @if ($puestos->Estatus==0)
            <button type="submit" class="btn btn-danger">Desactivar</button>
        @else
            <button type="submit" class="btn btn-success">Activar</button>
        @endif
    </form>
@stop