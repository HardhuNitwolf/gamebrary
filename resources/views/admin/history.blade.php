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
            <td class="members">fecha de alquiler</td>
            <td class="members">fecha a devolver</td>
        </tr>
        @foreach ($renting as $product)
        <tr>

            <td class="members">{{$product->name}}</td>
            <td class="members">{{$product->iniRenting}}</td>
            <td class="members">{{$product->endRenting}}</td>
            <td> <a href="{{route('details.recovery', ['product_id'=>$product->product_id, 'user_id'=>$product->member_id])}}" style="color: black; text-decoration:none"> Devolver</a></td>

            @endforeach
    </table>
</div>
@endsection
@extends ('layouts.footer')