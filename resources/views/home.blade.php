@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <p class="question">¿Qué te apetece alquilar hoy?</p>
        <div class="imgs" style="display: flex;">

                <div class="img-hover1"  >
                    
                    <a href="{{Route('games')}}">  <img  src="../public/images/juego.jpg"> </a>
                </div>
                <div class="img-hover2" >
                     <a href="{{Route('books')}}" > <img  src="../public/images/libro.jpg"></a>  
                </div>

            </div>
        </div>
    </div>

@endsection
@extends ('layouts.footer')