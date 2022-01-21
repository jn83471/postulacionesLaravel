@extends("../templates/header")

@section('content')
<div class="row">
    <div class="col-12">
        <label for="search">Postulantes</label>
        <input type="text" id="search" placeholder="Buscar postulantes" class="form-control">
    </div>
</div>
<div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Calle</th>
        <th scope="col">Número</th>
        <th scope="col">Colonia</th>
        <th scope="col">Código postal</th>
        <th scope="col">Email</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Rfc</th>
        <th scope="col">Puesto</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody id="content">
        @foreach ($prospect as $p)
        <tr class='{{($p->Estatus==1)?"bg-success":(($p->Estatus==2)?"bg-danger":"")}}'>
            <th scope="row"><a href="{{route("prospects.show",[$p->id])}}">{{$p->id}}</a> </th>
            <td>{{$p->apellidoPaterno." ".$p->apellidoMaterno." ".$p->nombre}}</td>
            <td>{{$p->calle}}</td>
            <td>{{$p->numero}}</td>
            <td>{{$p->colonia}}</td>
            <td>{{$p->cp}}</td>
            <td>{{$p->email}}</td>
            <td>{{$p->phone}}</td>
            <td>{{$p->rfc}}</td>
            <td>{{$p->hasPuesto->display_name}}</td>
            <td>
                @if($p->Estatus==0)
                <form action="{{route("prospects.update",[$p->id])}}" method="post">{{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-success" value="acept" name="acept">Autorizar</button>
                    <button type="submit" class="btn btn-danger mt-1" value="reset" name="acept">Rechazar</button>
                </form>
                @endif
                
            </td>
        </tr>
        @endforeach
    </tbody>
    
  </table>
</div>
@if (!$prospect->onFirstPage())
<a href="{{ $prospect->previousPageUrl() }}" class="btn btn-primary" rel="next" aria-label="@lang('pagination.next')">
    Página anterior
</a>
@endif
        @if ($prospect->hasMorePages())
                
                <a href="{{ $prospect->nextPageUrl() }}" class="btn btn-primary" rel="next" aria-label="@lang('pagination.next')">
                    Siguiente página
                </a>
        @endif
@stop