@extends("../../templates/header")

@section('content')
<div class="clearfix">
    <a href="{{route("puestos.create")}}" class="btn btn-primary ">Add</a>
</div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estatus</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody id="content">
                @foreach ($puestos as $p)
                <tr class='{{($p->Estatus==0)?"bg-success":(($p->Estatus==1)?"bg-danger":"")}}'>
                    <th scope="row"><a href="{{route("puestos.show",[$p->id])}}">{{$p->id}}</a> </th>
                    <td>{{$p->display_name}}</td>
                    <td>
                        @if ($p->Estatus==0)
                            Activo
                        @else
                            Desactivado
                        @endif
                    </td>
                    <td>
                        <form action="{{route("puestos.destroy",[$p->id])}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }} 
                            @if ($p->Estatus==0)
                                <button type="submit" class="btn btn-danger">Desactivar</button>
                            @else
                                <button type="submit" class="btn btn-success">Activar</button>
                            @endif
                        </form>
                        <a href="{{route("puestos.edit",[$p->id])}}" class="btn btn-primary mt-2">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
          </table>
@stop