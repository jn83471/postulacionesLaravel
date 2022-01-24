<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Prospectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div class="menu fixed-top">
        <span class="left"> Home </span>
        <span class="left"> Categories </span>
        <span class="left"> Contact </span>
        <span class="left"> About Us </span>

        <img class="logo" src="https://image.ibb.co/b3tQRK/153297876771137380.png">


        <span class="right"> <a href="{{route("postulantes")}}" class="text-white">Postulantes</a></span>

        <span class="right"> <a href="{{route("login")}}" class="text-white">Login</a></span>

        <span class="right"> <a href="{{route("register.index")}}" class="text-white">Register</a></span>

      </div>


      <div class="row mt-5 pt-2">
          <div class="col-12">
              <label for="search">Postulantes</label>
              <input type="text" id="search" placeholder="Buscar postulantes" class="form-control">
          </div>
      </div>
      <div class="table-responsive container-fluid">
          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Puesto</th>
              <th scope="col">Estatus</th>
            </tr>
          </thead>
          <tbody id="content">
              @foreach ($prospect as $p)
              <tr class='{{($p->Estatus==1)?"bg-success":(($p->Estatus==2)?"bg-danger":"")}}'>
                  <th scope="row"><a href="{{route("prospects.show",[$p->id])}}">{{$p->id}}</a> </th>
                  <td>{{$p->apellidoPaterno." ".$p->apellidoMaterno." ".$p->nombre}}</td>
                  <td>{{$p->email}}</td>
                  <td>{{$p->hasPuesto->display_name}}</td>
                  <td>
                      @if($p->Estatus==0)
                      Enviado
                      @elseif($p->Estatus==1)
                        Aceptado
                      @else
                        Rechazado
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



</body>
<script src="/js/principal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.js"></script>
@if(session()->has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session()->get('message') }}',
            showConfirmButton: false,
            timer: 1500
          })
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
