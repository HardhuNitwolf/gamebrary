var url = '/gamebrary/public';
window.addEventListener("load",function(){
$('#buscador').submit(function(){
    
    $(this).attr('action',url+'/juegos/'+$('#buscador #search').val());
    
});
$('#buscador1').submit(function(){
    
    $(this).attr('action',url+'/libros/'+$('#buscador1 #search1').val());
    
});
});