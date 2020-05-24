@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<!--<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
  
     <link rel="stylesheet" href="./css/header.css">
      <link rel="stylesheet" href="./css/footer.css">
     
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!--
        <div class="container">
            <h2>Juegos</h2>  
            <div id="myCarousel" style="width:50%;margin-left: 13vw" class="carousel slide" data-ride="carousel">
                <!-- Indicators 
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>          
               
                
                <!-- Left and right controls 
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>-->
                
<div  style="display: flex;">

    <div style="width: 15%; margin: 0 1vw;">
        <h2 class="categoryTitle">Libros</h2>
        <form method="GET" action="{{route('books')}}" id="buscador">
            <input type="text" id="search" class="form-control"/>
            
            <input style="margin-top: 1vh; border-radius: 0.5vw" type="submit" value="Buscar" />
        </form>
        <!--
    <div style=" height: 30vh">
         <div class="categories">
        <a><p>Todo</p></a>
        </div>
        <div class="categories">
            <form action="GamesController@getCategory" method="GET"><p>Corta duración</p></form>
        </div>
        <div class="categories">
        <a><p>Larga duración</p></a>
        </div>
        <div class="categories">
        <a><p>Tablero</p></a>
        </div>
        <div class="categories">
        <a><p>Cartas</p></a>
        </div>
        
    </div>
-->
    </div>
    <div style="display: flex; flex-wrap:wrap; justify-content:space-around;  width: 60%; margin: 0 2vw;">

        @foreach ($books as $book)

        @if ($book->image)
        <div style="margin: 2vw; max-width:15vw ;background: #009DE0;">
            <a href="{{Route('book.detail',['id'=>$book->id])}}"><img class="imageArt" src="{{ route('image.file', ['filename'=> $book->image]) }}" alt="Libros" style="width:100%;"></a>
            <br>
            
            <p class="tituloArt">{{$book->name }} </p>
        </div>
        
        @endif
 
        @endforeach
      
          <div class="clearfix"> </div>
          <div style="margin-top: -1vh; position: absolute">
        {{$books->links()}}
        </div>
    </div>
  <div style="display: flex; flex-wrap:wrap; justify-content:space-around;  width: 15%; margin: 0 2vw;">

      <div class="interest">
          <h3 style="color: white; text-align: center; margin-right: 2vw">Páginas de interés</h3>
          <a href="https://zacatrus.es/" target="_blank"> <img class="promotion" style="width: 240px;height: 80px" src="{{ asset('images/zacatrusb.PNG') }}"></a>
          <a href="https://www.goblintrader.es/" target="_blank"> <img class="promotion" style="width: 240px;height: 80px" src="{{ asset('images/GT.JPG') }}"></a>
          <a href="https://homoludicus-valencia.org/" target="_blank"> <img class="promotion" style="width: 240px;height: 80px" src="{{ asset('images/homoludicus-logo.JPG') }}"></a>
          <a href="http://www.e-minis.net/" target="_blank"> <img class="promotion" style="width: 240px;height: 80px" src="{{ asset('images/e-minis-banner.JPG') }}"></a>
      </div>  
    </div>
   
</div>
    <!--
    <div style=" width: 20%; margin: 0 1vw;">
        <h2 class="categoryTitle">Páginas de interés</h2>
        <div id="myCarousel" style="width:25%;margin: 2vw 1vw 2vw 4vw;width: 10vw; " class="carousel slide" data-ride="carousel">
                
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                
                
            <div class="carousel-inner" >

                    <div class="item active">
                       
                        <a> <img src="{{ asset('images/homoludicus.png') }}"  style="width:100%;"></a>
                    </div>
                    <div class="item">
                        <a> <img src="{{ asset('images/zacatrus.png') }}"  style="width:100%;"></a>
                    </div>
                         <div class="item">
                        <a> <img src="{{ asset('images/gts.png') }}"  style="width:100%;"></a>
                    </div>


                </div> 
                
                
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </div>
    
</div>
    
</html>

-->


@endsection
@extends ('layouts.footer')