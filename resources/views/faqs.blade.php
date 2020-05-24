@extends('layouts.app')

@section('content')

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
        <div class="card-body">
        <p style="font-weight: bold">1.¿Qué puedo alquilar?</p>  
        <p>Dispones de un catálogo de juegos de mesa y libros de rol que podrás recoger en nuestras instalaciones</p>
        <p style="font-weight: bold">2.¿Cuántos artículos puedo alquilar?</p>  
        <p>El máximo de artículos disponibles para alquilar por usuario es de cinco</p>
        <p style="font-weight: bold">3.¿Debo estar registrado para alquilar?</p>  
        <p>Sí. Si quieres disfrutar de cualquiera de nuestros productos debes ser socio primero</p>
         <p style="font-weight: bold">4.¿Qué sucede si me demoro con alguna devolución?</p>  
         <p>En caso de que te demores en devolver un artículo sin haber avisado de antemano tendrás una penalización<br> 
           en tus próximos alquileres. Por cada día de demora tendrás un día de bloqueo de alquiler</p>
         <p style="font-weight: bold">5.¿Qué puedo hacer si quiero renovar el alquiler de algún artículo?</p>  
         <p>Para renovar cualquier artículo debes ponerte en <a href="{{route('contact')}}">contacto</a> con el equipo para que te confirmen la renovación.</p>




</div>
</div>
        </div>
</div>
</body> 
@endsection
@extends ('layouts.footer')
