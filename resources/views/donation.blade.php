@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Colabora') }}</div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{Route('donation')}}" method="GET" enctype="text/plain">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="name">Nombre del juego:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="game" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-6" for="status">Estado:</label>
                            <div class="col-sm-6">
                                <select id="status" name="status">
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Gastado">Gastado</option>
                                    <option value="Deteriorado">Deteriorado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="name">Observaciones</label>
                            <div class="col-sm-6">
                                <textarea name="comments" rows="10" cols="47" >Escribe aquí tus comentarios</textarea>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6 env">
                                    <button class="btn btn-primary" type="submit" >Enviar</button>
                                </div>
                            </div>
                              </div>
                    </form>
                
              
            </div>
        </div>
    </div>
</div>


@endsection
@extends ('layouts.footer')