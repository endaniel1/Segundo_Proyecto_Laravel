@extends('admin.template.main')

@section("title","Inicio de Sección")

@section("Logo_Conte","glyphicon glyphicon-lock")
@section("Info_Conte","Iniciar de Sección")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio de Sección</div>

                <div class="panel-body">
                    {!!Form::open(["route"=>"login","method"=>"POST","class"=>"form-horizontal"]) !!}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} " has-error >                        
                        </div>                        
                       
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                            
                        </div>     
                        <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
                            <br />
                            <tr>
                                <td align="right">
                                {!! Form::label("email","Correo Electronico")!!}: 
                                </td>
                                <td>
                                    {!! Form::email("email",null,["class"=>"form-control","placeholder"=>"Correo Electronico","required","style"=>"width:80%;"])  !!}
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    {!! Form::label("password","Contraseña")!!}: 
                                </td>
                                <td>
                                    {!! Form::password("password",["class"=>"form-control","placeholder"=>"********","required","style"=>"width:80%;"])  !!}
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    {{--{!! Form::checkbox('remember', null, old('remember') ? true : false) !!} Recordar --}}
                                     {!! Form::button("Acceder",["type"=>"submit","class"=>"btn btn-success btn-sm"])!!}
                                    
                                </td>
                                <td align="left">
                                    {!!link_to_route("password.request","Olvido su Contraseña?",null,["class"=>"btn btn-link"]) !!}                                    
                                </td>
                            </tr>
                        </table>
                        {{--Este es el input por si no funcion lo de recordar 
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                        y esta condiciones son por si nadan errorres
                        @if ($errors->has('email'))
                        <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                         </span>
                         @endif
                         @if ($errors->has('password'))
                         <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                         </span>
                          @endif

                        --}}
                    {!!Form::close() !!}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
