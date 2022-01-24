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
            @if($prospect->Estatus==2)
            <p>Motivo: <pre>{{$prospect->Motive}}</pre></p>
            @endif
            <ul class="list-group">
                @foreach ($prospect->hasfiles as $fila)
                    <li class="list-group-item position-relative overflow-hidden" style="text-overflow: ellipsis;">{{$fila->name}} <a href="/{{$fila->src}}" class="position-absolute top-0 end-0 m-2" target="_blank"><i class="fas fa-external-link-alt"></i></a></li>
                @endforeach
            </ul>

            @if($prospect->Estatus==0)
                <form action="{{route("prospects.update",[$prospect->id])}}" method="post">{{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-success" value="acept" name="acept">Autorizar</button>
                    <div class="mt-2">
                        <textarea name="Razor" class="form-control" placeholder="Razón del rachazo"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger mt-1 d-block" value="reset" name="acept">Rechazar</button>
                </form>
            @endif
@stop
