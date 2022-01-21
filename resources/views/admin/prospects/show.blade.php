@extends("../../templates/header")

@section('content')
            <p>Nombre: {{$prospect->apellidoPaterno." ".$prospect->apellidoMaterno." ".$prospect->nombre}}</p>
            <p>Calle: {{$prospect->calle}}</p>
            <p>Número: {{$prospect->numero}}</p>
            <p>Colonia: {{$prospect->colonia}}</p>
            <p>Código postal:{{$prospect->cp}}</p>
            <p>Email: {{$prospect->email}}</p>
            <p>Teléfono: {{$prospect->phone}}</p>
            <p>RFC: {{$prospect->rfc}}</p>
            <p>Puesto: {{$prospect->hasPuesto->display_name}}</p>
            <p>
            @if($prospect->Estatus==0)
                <form action="{{route("prospects.update",[$prospect->id])}}" method="post">{{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-success" value="acept" name="acept">Autorizar</button>
                    <button type="submit" class="btn btn-danger mt-1" value="reset" name="acept">Rechazar</button>
                </form>
            @endif
@stop