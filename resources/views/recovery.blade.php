@extends('layouts.app')
@section('content')
<head> 
<link rel="stylesheet" >
</head>

<div class="container">
   
    <table class="table" style="background-color: white; border: 2px black solid">
        <tr style="color: black;border: 2px black solid" class="cab">
        <td class="members">Artículo</td>
        <td class="members">Fecha de alquiler</td>
        <td class="members">Fecha de devolución</td>
        
    </tr>
@foreach ($rented as $details)
<tr style="background-color: white;">
    
        <td class="members">{{$details->name}}</td>          
        <td class="members">{{$details->iniRenting}}</td>      
        <td class="members">{{$details->endRenting}}</td>
        

  </tr>  
        @endforeach
</table>
    <div class="table-footer">
        <div class="clearfix"> </div>
        
    </div>
    </div>

@endsection
@extends ('layouts.footer')