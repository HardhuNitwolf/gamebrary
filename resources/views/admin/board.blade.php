
@extends('layouts.app')
@section('content')
<head> 
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<div class="container">
    <nav class="navbar navbar-expand-md navbar-laravel navadmin ">
        <div class="panelb membersb">
            <a class="dec" href="{{Route('admin.board')}}">Usuarios</a>  
        </div>
        <div class="panelb gamesb">
            <a class="dec" href="{{Route('admin.boardg')}}">Juegos</a>  
        </div>
        <div class="panelb booksb">
          <a class="dec" href="{{Route('admin.boardb')}}">Libros</a>  
        </div>
        
</nav>
<table class="table memberst">
    <tr class="cab">
        <td class="members">Nombre</td>
        <td class="members">Apellidos</td>
        <td class="members">Nick</td>
        <td class="members">Email</td>
        <td class="members">Rol</td>
         <td class="members">Límite Alq.</td>
        <td class="members">Funciones</td>
    </tr>
@foreach ($users as $user)
<tr>
    
        <td class="members">{{$user->name}}</td>          
        <td class="members">{{$user->surname}}</td>      
        <td class="members">{{$user->nick}}</td>
        <td class="members">{{$user->email}}</td>
        <td class="members">{{$user->role}}</td>
        <td class="members">{{$user->maxRenting}}</td>
        <td><!--<a href="/public"><img class="permision"  src="{{ asset('images/edit.PNG') }}">--></a>&nbsp;&nbsp;<a href="{{action('AdminController@deleteMember',['id'=>$user->id])}}"><img class="permision" src="{{ asset('images/Delete.PNG') }}"></a>
            @if ($user->maxRenting < 5)
            <a href="{{route('admin.history',['id'=>$user->id])}}"><img class="permision" style="color: white" src="{{ asset('images/historial.PNG') }}"> </a>
                @else
                <a href="{{route('admin.history',['id'=>$user->id])}}" style="display: none">Historial </a>
                @endif</td>
  </tr>  
        @endforeach
</table>
    <div class="table-footer">
        <div class="clearfix"> </div>
        {{$users->links()}}
    </div>
    </div>

@endsection
@extends ('layouts.footer')