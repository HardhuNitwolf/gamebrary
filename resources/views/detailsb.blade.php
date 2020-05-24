@extends('layouts.app')

@section('content')

<body> 
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<?php
 $user = \Auth::user(); 
    ?>
    <div class="bodyprin" style="justify-content: space-around">

        <div class="izq" style="width: 20%">
            <h2>{{$details->name}}</h2>
            <div  class="miniature">
                <img style="max-width: 8vw;" src="{{ route('image.file', ['filename'=> $details->image]) }}">
            </div>
            <div class="inf" style="margin-top: 1vh">

                <p>Dados necesarios:{{$details->dice}}</p>
                
                @if ($details->stock>0)
                <p>Disponibles:{{$details->stock}}</p> 
                @else
                <p style="color:orange;">Producto no disponible</p> 
                  @endif
            </div>
        </div>
        <div class="cent" style="width: 40%"> 
            <div class="vid">
                <iframe width="720" height="360" src="http://www.youtube.com/embed/{{$details->explanation}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            @guest
            <div style="display: none" class="rent">
                <a class="alq" href="{{ url('/') }}" >
                    Alquilar
                </a>
                <p>Debes estar registrado<br>para alquilar artículos</p>
            </div>
            @else
            
            <div  class="rent">
                @if ($user->maxRenting>0)
                <a class="alq" href="{{ route('renting.product',['id'=>$details->id]) }}" >
            Alquilar
            </a>
                <form  action="{{ route('renting.product',['id'=>$details->id]) }}" method="GET" style="display: none;">
                {{ csrf_field() }}
</form>
                @elseif($rented){
                 <p style="color:white;font-size: 16px">Este artículo ya lo tienes alquilado</p>
                }
                @else
                <p style="color:white;font-size: 16px">Has alcanzado el número máximo de alquileres</p>
                @endif
            </div>
            
            @endguest
        </div>
        <div class="der" style="width: 30%">
            <div class="advice">
                {{$details->description}}
            </div>

        </div>
    </div>



</body>
@endsection
@extends ('layouts.footer')