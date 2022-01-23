
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prospectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="menu fixed-top">
        <span class="left"> Home </span>
        <span class="left"> Categories </span>
        <span class="left"> Contact </span>
        <span class="left"> About Us </span>

        <img class="logo" src="https://image.ibb.co/b3tQRK/153297876771137380.png">

        <span class="right"> <a href="{{route("login")}}" class="text-white">Login</a></span>

        <span class="right"> <a href="{{route("register.index")}}" class="text-white">Register</a></span>

      </div>
    <div class="container" style="margin-top:70px;">

      <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

          <h1>Contactanos para agendar cualquer sita</h1>

          <p class="lead">Esta no es una página oficial favor de no ingresar datos reales</p>

          <form id="contact-form" method="post" action="{{route("register.store")}}" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
          <div class="messages"></div>

          <div class="controls">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">Nombre *</label>
                  <input id="form_name" type="text" name="nombre" class="form-control" placeholder="Favor de ingresar tu nombre." required="required" data-error="Firstname is required.">
                  <div class="help-block with-errors"></div>
                    @if($errors->has('nombre'))
                    <div class="help-block with-errors">{{ $errors->first('nombre') }}</div>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Apellido Paterno *</label>
                  <input id="form_lastname" type="text" name="app" class="form-control" placeholder="Favor de ingresar tu apellido paterno." required="required" data-error="Lastname is required.">

                  @if($errors->has('app'))
                    <div class="help-block with-errors">{{ $errors->first('app') }}</div>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Apellido Materno *</label>
                  <input id="form_lastname" type="text" name="apm" class="form-control" placeholder="Favor de ingresar tu apellido Materno." required="required" data-error="Lastname is required.">
                  @if($errors->has('apm'))
                    <div class="help-block with-errors">{{ $errors->first('apm') }}</div>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Email *</label>
                  <input id="form_lastname" type="email" name="email" class="form-control" placeholder="Favor de ingresar tu apellido Materno." required="required" data-error="Lastname is required.">
                  @if($errors->has('email'))
                    <div class="help-block with-errors">{{ $errors->first('email') }}</div>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_email">Calle:</label>
                  <input id="form_email" type="text" name="calle" class="form-control" placeholder="Ingresa la calle donde vives." required="required" data-error="Valid email is required.">
                  @if($errors->has('calle'))
                    <div class="help-block with-errors">{{ $errors->first('calle') }}</div>
                    @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_phone">Número:</label>
                  <input id="form_phone" type="number" name="numero" class="form-control" placeholder="Inserta tu número exterior de casa.">
                  @if($errors->has('numero'))
                    <div class="help-block with-errors">{{ $errors->first('numero') }}</div>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="form_email">Colonia:</label>
                    <input id="form_email" type="text" name="col" class="form-control" placeholder="Ingresa tu colonia." required="required" data-error="Valid email is required.">
                    @if($errors->has('col'))
                    <div class="help-block with-errors">{{ $errors->first('col') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="form_phone">CP:</label>
                    <input id="form_phone" type="number" name="cp" class="form-control" placeholder="Ingresa tu código postal.">
                    @if($errors->has('cp'))
                    <div class="help-block with-errors">{{ $errors->first('cp') }}</div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="form_email">Teléfono:</label>
                    <input id="form_email" type="tel" name="phone" class="form-control" placeholder="Ingresa tu teléfono." required="required" data-error="Valid email is required.">
                    @if($errors->has('nombre'))
                    <div class="help-block with-errors">{{ $errors->first('nombre') }}</div>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="form_phone">RFC:</label>
                    <input id="form_phone" type="text" name="rfc" class="form-control" placeholder="Rfc">
                    @if($errors->has('rfc'))
                    <div class="help-block with-errors">{{ $errors->first('rfc') }}</div>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row mt-2 parent-element" id="files">
                <div class="col-md-12">
                    <input type="file" class="d-none" name="test" id="btn-add">
                    <label for="btn-add" class="btn btn-danger d-block mx-auto"><i class="fas fa-plus-square"></i></label>
                </div>
                @if($errors->has('files[]'))
                    <div class="help-block with-errors">{{ $errors->first('files[]') }}</div>
                @endif
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="form_email">Puesto:</label>
                    <select name="puesto" class="form-control" id="puesto">
                        <option value="">Elige algún puesto</option>
                        @foreach ($puestos as $p)
                            <option value="{{$p->id}}">{{$p->display_name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                @if($errors->has('puesto'))
                    <div class="help-block with-errors">{{ $errors->first('puesto') }}</div>
                 @endif
              </div>


            <div class="row mt-2">
              <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p class="text-muted"><strong>*</strong> These fields are required. Contact form template by <a href="https://bootstrapious.com" target="_blank">Bootstrapious</a>.</p>
              </div>
            </div>
          </div>

          </form>

        </div>

      </div>

    </div>
  </body>
  <script src="/js/up.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
