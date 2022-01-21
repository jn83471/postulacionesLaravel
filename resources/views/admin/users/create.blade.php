@extends("../../templates/header")

@section('content')

<div class="row">
  
    <div class="col-lg-8 col-lg-offset-2">

      <form id="contact-form" method="post" action="{{route("usuario.store")}}" role="form">
        {{ csrf_field() }}
        <div class="messages"></div>
        <div class="controls">

            <div class="row">
            <div class="col-12">
                <div class="form-group">
                <label for="form_name">Nombre *</label>
                <input id="form_name" type="text" name="nombre" class="form-control" placeholder="Favor el nombre del puesto." required="required" data-error="Firstname is required.">
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                <label for="form_name">Email *</label>
                <input id="form_name" type="email" name="email" class="form-control" placeholder="Favor el nombre del puesto." required="required" data-error="Firstname is required.">
                <div class="help-block with-errors"></div>
                </div>
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
      </form>

    </div>
</div>
@stop