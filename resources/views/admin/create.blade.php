
@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Añadir artículo') }}</div>
                <div class="card-body">
                    <form action="{{action('AdminController@saveProduct')}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="form-group row" >
        <label for="name" class="col-md-4 col-form-label text-md-right"> Nombre </label>
        <input type="text" name="name">
        </div>
        
        <div class="form-group row" >
        <label for="typus" class="col-md-4 col-form-label text-md-right"> Artículo </label>

        <select name="typus">
            <option>juego</option>
            <option>libro</option>

        </select>
        </div>
       
        <div class="form-group row" >
        <label for="category" class="col-md-4 col-form-label text-md-right"> Categoría </label>
        <select name="category">
            <option value="Mundo tinieblas">Mundo Tinieblas</option>
            <option value="Strategy"> Estrategia</option>
            <option value="Terror">Terror</option>
            <option value="Dungeon">Dungeon</option>
            <option value="LongDuration">Larga duración</option>
            <option value="Cards">Cartas</option>
            <option value="Starter"> Starter</option>
            <option value="Fantasy_Scifi">Fantasía y Ciencia Ficción</option>

        </select>
        </div>
        
        <div class="form-group row" >
        <label for="description" class="col-md-4 col-form-label text-md-right"> Descripción </label>
        <input type="text" name="description">
        </div>
        
<div class="form-group row" >
        <label for="image" class="col-md-4 col-form-label text-md-right"> Imagen </label>
        <input type="file" name="image">
        </div>
        
        <div class="form-group row" >
        <label for="players" class="col-md-4 col-form-label text-md-right"> NºJugadores </label>
        <input type="text" name="players">
        </div>
        
        <div class="form-group row" >
        <label for="age" class="col-md-4 col-form-label text-md-right"> Edad </label>
        <input type="text" name="age">
        </div>
        
        <div class="form-group row" >
        <label for="duration" class="col-md-4 col-form-label text-md-right"> Duración </label>
        <input type="text" name="duration">
        </div>
        
        <div class="form-group row" >
        <label for="dice" class="col-md-4 col-form-label text-md-right"> Tipo de dados </label>
        <input type="text" name="dice">
        </div>
       
        <div class="form-group row" >
        <label for="explanation" class="col-md-4 col-form-label text-md-right"> Explicación </label>
        <input type="text" name="explanation" >
        </div>
        
        
        <div class="form-group row" >
        <label for="stock" class="col-md-4 col-form-label text-md-right"> Cantidad </label>
        <input type="number" name="stock">
        </div>
        
        
        <div class="col-md-6 offset-md-4">
            <input class="edi" type="submit" value="Guardar">
        </div>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div
@endsection
@extends ('layouts.footer')