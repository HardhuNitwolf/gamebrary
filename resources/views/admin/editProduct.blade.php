<?php
$typus = $product->typus;
?>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Editar artículo') }}</div>
                <div class="card-body">
                    <form action="{{isset($product) ? action('AdminController@updateProduct',['typus'=>$product->typus]) : action('AdminController@saveProduct')}}" method="POST" enctype="multipart/form-data">

                        @if(isset($product) && is_object($product))
                        <input type="hidden" name="id" value="{{$product->id}}">
                        @endif
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Nombre </label>
                            <input type="text" name="name"  value="{{ $product->name }}">

                        </div>
                        <div class="form-group row">
                            <label for="typus" class="col-md-4 col-form-label text-md-right"> Tipo </label>
                                <p  >{{ $product->typus  }} </p>

                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right"> Categoría </label>
                          <p >{{ $product->category  }} </p>

                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"> Descripción </label>
                            <input type="text" name="precio" value="{{$product->description }}">
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right"> Avatar </label>
                            <input type="file" name="image" value="{{ $product->image }}">

                        </div>

                        @if($typus == 'juego')
                        <div class="form-group row">
                            <label for="players" class="col-md-4 col-form-label text-md-right"> Nº jugadores </label>
                            <input type="text" name="players" value="{{$product->players }}">
                        </div>

                        <div class="form-group row" >
                            <label for="age" class="col-md-4 col-form-label text-md-right"> Edad </label>
                            <input type="text" name="age" value="{{$product->age }}">
                        </div>

                        <div class="form-group row" >
                            <label for="duration" class="col-md-4 col-form-label text-md-right"> Duración </label>
                            <input type="text" name="duration" value="{{$product->duration }}">
                        </div>

                        @elseif($typus == 'libro')
                        <div class="form-group row" >
                            <label for="dice" class="col-md-4 col-form-label text-md-right"> Dados </label>
                            <input type="text" name="dice" value="{{$product->dice }}">
                        </div>

                        @endif
                        <div class="form-group row" >
                            <label for="explanation" class="col-md-4 col-form-label text-md-right"> Explicación</label>
                            <input type="text" name="explanation" value="{{$product->explanation }}">
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right"> Cantidad</label>
                            <input type="number" name="stock" value="{{$product->stock }}">
                        </div>

                        <div class="form-group row mb-0" id="edite"> 
                            <div id="edi" class="col-md-6 offset-md-4" >
                                <input type="submit" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends ('layouts.footer')