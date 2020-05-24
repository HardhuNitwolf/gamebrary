
@extends('layouts.app')
@section('content')
<div class="container">
<h1>Añadir usuario</h1>
<form action="{{action('AdminController@saveMember')}}" method="POST">

    {{csrf_field()}}
    <label for="role"> Rol </label>
    
            <select name="role">
                <option>user</option>
                <option>admin</option>
                
            </select>
    <br>
    <label for="name"> Nombre </label>
    <input type="text" name="name">
    <br>

     <label for="surname"> Apellidos </label>
    <input type="text" name="surname">
    <br>


  
    <label for="nick"> Nick </label>
    <input type="text" name="nick">
    <br>
    
    <label for="email"> Email </label>
    <input type="email" name="email">
    <br>
    <label for="password"> Contraseña </label>
    <input type="text" name="password">
    <br>
    <label for="image"> Avatar </label>
    <input type="file" name="image">
    <br>
    
    <input type="submit" value="Guardar">
</form>
</div>
@endsection
@extends ('layouts.footer')