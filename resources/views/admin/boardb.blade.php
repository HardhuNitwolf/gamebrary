@extends('layouts.app')
@section('content')
<head> 
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<div class="container">
   <nav class="navbar navbar-expand-md navbar-laravel  navadmin">
        <div class="panelb membersb">
          <a class="dec" href="{{Route('admin.board')}}">Usuarios</a>  
        </div>
        <div class="panelb gamesb">
            <a class="dec" href="{{Route('admin.boardg')}}">Juegos</a>  
        </div>
        <div class="panelb  booksb">
          <a class="dec" href="{{Route('admin.boardb')}}">Libros</a>  
        </div>
        
</nav>
<table class="table bookst">
    <tr class="cab">
        <td class="members">Nombre</td>
        <td class="members">Categoria</td>
        <td class="members">Stock</td>
       
        <td class="members">Funciones</td>
    </tr>
@foreach ($books as $book)
<tr>
    
        <td class="members">{{$book->name}}</td>          
        <td class="members">{{$book->category}}</td>      
        <td class="members">{{$book->stock}}</td>
 <td><a href="{{action('AdminController@editProduct',['id'=>$book->id,])}}" ><img class="permision" src="{{ asset('images/edit.PNG') }}"></a>&nbsp;&nbsp;<a href="{{action('AdminController@deleteProduct',['id'=>$book->id,'typus'=>$book->typus])}}"><img class="permision" src="{{ asset('images/Delete.PNG') }}"></a></td>
        
  </tr>  
        @endforeach
         
</table>
    <div class="table-footer">
    <a class="add" href="{{Route('admin.create')}}" ><img class="permision" src="{{ asset('images/add.PNG') }}">&nbsp;&nbsp;Añadir Libro</a>
    <div class="clearfix"> </div>
        {{$books->links()}}
        </div>
    </div>
@endsection
@extends ('layouts.footer')