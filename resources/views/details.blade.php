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
            <h2 style="color: white;margin-bottom: 1vw;text-align: left">{{$details->name}}</h2>
            <div  class="miniature">
                <img style="max-width: 8vw; border-radius: 2vw" src="{{ route('image.file', ['filename'=> $details->image]) }}">
            </div>
            <div class="inf" style="margin-top: 1vh">
                @if($details->typus=='juego')
                <p>Número de jugadores: {{$details->players}}</p>
                <p>Edad: {{$details->age}}</p> 
                <p>Duración: {{$details->duration}}</p>
                @else
                <p>Tipo de dados:{{$details->dice}}</p>
                @endif
                @if ($details->stock>0)
                <p>Disponibles: {{$details->stock}}</p> 
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
            <div  class="rent">
                <a class="alq" href="{{ route('register') }}">{{ __('Registrate') }}</a>
            </div>

            <div class="nav-item">
                <br>
                <span style="color: white; text-align: justify; font-size: 18px">Debes estar registrado para alquilar artículos </span>

            </div>

            
            
            @elseif ($alquilado == true)
            <p style="color:white;font-size: 16px">Este artículo ya lo tienes alquilado</p>
            @elseif ($user->maxRenting <= 0)
            <p style="color:white;font-size: 16px">Has alcanzado el número máximo de alquileres</p>
            @else
            <a class="alq rent"  href="{{ route('renting.product',['id'=>$details->id]) }}">Alquilar</a>

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

<!-- <a href="{{ route('renting.product',['productId'=>$details->id]) }}" >
            Alquilar
            </a>
                <form  action="{{ route('renting.product',['productId'=>$details->id]) }}" method="POST" style="display: none;">
                {{ csrf_field() }} -->