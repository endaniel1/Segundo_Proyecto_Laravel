{{-- @extends extiende o en este caso incluye el archivo siguiente --}}
@extends("admin.template.main")

{{-- @section define lo q se va a sustituir a la parte q este caso es la title --}}
{{-- @section tambien como segundo paremetro se le puedeo colocar lo q va pero esto es para algo corto xomo por ejemplo un texto --}}
@section("title","Inicio de Mi Pagina")

@section("Logo_Conte","glyphicon glyphicon-flag")
@section("Info_Conte","Inicio de Página")

@section("content")
    <h1>Hola estoy utilizando boostrap para el diseño</h1>    
@endsection

