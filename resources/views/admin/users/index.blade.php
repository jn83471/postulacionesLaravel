@extends("../../templates/header")

@section('content')
<div class="clearfix">
    <a href="{{route("usuario.create")}}" class="btn btn-primary float-end">Add</a>
</div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody id="content">
                @foreach ($user as $p)
                <tr>
                    <th scope="row">{{$p->id}}</a> </th>
                    <td>{{$p->name}}</td>
                    <td>
                        {{$p->email}}
                    </td>
                    <td>
                        <a href="{{route("usuario.edit",[$p->id])}}" class="btn btn-primary mt-2">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

          </table>
@stop
