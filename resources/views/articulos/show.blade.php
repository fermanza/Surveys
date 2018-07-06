@extends('layouts.master')
@section('title', 'Artículos')
@extends('includes.header')
@section('content')

<style>
.labels
{
    color: black;
    text-transform: uppercase;
}
.contenido
{
    font-size: 16px;
    color: #000;
    margin-bottom: 30px;
}
    
</style>

     <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Art&iacute;culos</h1>
                            <!-- end page title -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bread-bottom wow fadeIn no-padding page-title-small">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 display-table xs-text-left xs-margin-10px-top">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small">
                            <!-- start breadcrumb -->
                            <ul class="xs-text-center">
                                <li><a href="{{ URL('/')}}" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li><a href="{{ URL('articulos')}}" class="text-dark-gray">@lang('articulos.articulos')</a></li>
                                <li class="text-dark-gray">{{ $articulo->title }}</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

<section>
    <div class="container">	
        <div class="row">	
        
        <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="display-inline-block width-100 margin-30px-bottom xs-margin-25px-bottom temas">
                            @if(Auth::check() == true)  
                                @if($user->id == 1) 
                                <div align="center">
                                           <br><a class="temas-title" href="{{route('articulos.create')}}">@lang('articulos.crearArticulo')</a><br><br>
                                </div>
                                @endif  
                            @endif  
                            <div class="temas-title">@lang('articulos.temas')</div> 
                                {{-- <div class="select-style big-select">

                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                         <option value="">@lang('articulos.seleccionarCategoria')</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div> --}}
                                <div class="buscar position-relative">
                             <form method="GET" action="{{ route('articulos.index') }}">   
                                    <input type="text" class="bg-transparent no-margin border-color-extra-light-gray medium-input pull-left" name="articulo" placeholder="Buscar">
                                    <button type="submit" class="bg-transparent position-absolute right-0 top-8" style="border: none;"><i class="fa fa-search no-margin-left"></i></button>

                              </form>  
                                </div>  
                            

                
                        
                        </div>         
                        @if(Auth::check() == false) 
                        <div class="margin-30px-bottom xs-margin-25px-bottom reg">
                            <div class="display-inline-block width-100">
                                <h6>@lang('encuestas_publicas.quieresCrearEncuesta')</h6>
                                <p>@lang('encuestas_publicas.suscribete')</p>
                                <form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="row" align="center">
                                        <div class="col-md-12">
                                            <input type="text" name="name" id="name" placeholder="@lang('encuestas_publicas.nombre')">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="last_name" id="lastName">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="company" id="empresa">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="email" name="email" id="email" placeholder="E-mail">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="password" name="password" id="password" placeholder="@lang('encuestas_publicas.contra')">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="password_confirmation" id="password_confirmation">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="address" id="direccion">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="phone" id="telefono">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="city" id="ciudad">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="country" id="pais">
                                        </div>
                                        <div class="col-md-12" style="text-align:left;">
                                            <input type="checkbox" id="check" required>
                                            <label for="check" class="text-extra-dark-gray">@lang('encuestas_publicas.aceptoLos') <a href="{{ URL('terminos')}}">@lang('encuestas_publicas.terminos')</a></label>
                                        </div>
                                        <div class="col-md-12">
                                            {{-- <input type="button" name="ingresar" id="ingresar" value="Crear encuesta"> --}}
                                            <br><button type="submit" class="btn-success">@lang('encuestas_publicas.crearCuenta')</button><br><br>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-extra-dark-gray">@lang('encuestas_publicas.obtenerPotencia')<br><a href="{{ URL('planes')}}">@lang('encuestas_publicas.verPlanes')</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                       {{-- <div class="margin-45px-bottom xs-margin-25px-bottom archivo">
                            <div class="text-extra-dark-gray margin-20px-bottom text-uppercase">Archivo</div>
                            <ul class="list-style-6 margin-50px-bottom text-small">
                                <li><a href="#"><i class="fa fa-calendar"></i> Octubre 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Septiembre 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Agosto 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Julio 2017</a></li>
                            </ul>   
                        </div> --}}
                        
                    </aside>

 <main class="col-md-9 col-sm-12 col-xs-12 sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
		
		<h6 class="labels" align="center">{{ $articulo->title }}</h6>
        <p class="labels" align="left">{{ $articulo->user->name }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;{{ Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y') }}</p>
        <p class="labels" align="left"></p>
        <div align="center">
        <hr />
		<img src="{{URL($articulo->img)}}" style="width: auto !important; height: auto !important; max-width: 60%;">
		<br><br><br>
        {!! $articulo->body !!}
        </div>
	   <div align="center">
        <hr />
        <a class="btn" href="{{ URL('articulos') }}">Volver a Artículos</a>
        </div>

</main>

        </div>
    </div>
</section>

	


@push('script')
<script type="text/javascript">
	$('#back').click(function(){
		window.history.back();
	});
</script>
@endpush