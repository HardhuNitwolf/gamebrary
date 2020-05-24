@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Mi perfil') }}</div>

                <div class="card-body">
                    
                        @csrf
                        <div class="form-group row" id="avy">
                            @if(Auth::user()->image)
                             <img class="avatar" src="{{route('user.avatar',['filename'=>Auth::user()->image])}}"/>
                             
                             @endif
                        </div>    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <p class="prof">{{ Auth::user()->name  }} </p>

                                
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                  <p class="prof">{{ Auth::user()->surname  }} </p>

                                
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>

                            <div class="col-md-6">
                                  <p class="prof">{{ Auth::user()->nick  }} </p>

                                
                            </div>
                         </div>
                        <div id="adjust">
                         <div class="form-group row">
                            <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                             <p class="prof">{{ Auth::user()->email  }} </p>

                                
                            </div>
                         </div>
                        
                         <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Alquileres restantes') }}</label>

                            <div class="col-md-6">
                               <p class="prof">{{ Auth::user()->maxRenting  }} </p>

                                
                            </div>
                         </div>
                        </div>
                        

                        <div class="form-group row mb-0" id="edite">
                            <div id="edi" class="col-md-6 offset-md-4" >
                                <a   type="button" href="{{ route('config') }}" class="btn btn-primary">
                                    Editar
                                </a>
                            </div>
                        </div>
                        <div class="form-group row mb-0" id="edite">
                            <div id="edi" class="col-md-6 offset-md-4" >
                                <a class="alq" style="margin-left: 9vw" href="{{ route('recovery',['id'=>Auth::user()->id ]) }}" > Historial</a>
                                 
                            </div>
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@extends ('layouts.footer')