@extends('layouts.master')
@section('title', 'Artículos')

@extends('includes.header')
<? include 'includes/head.php' ?>
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('articulos.articulos')</h1>
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
                                <li><a href="index.php" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li class="text-dark-gray">@lang('articulos.articulos')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <!-- start post content section --> 
        <section>
            <div class="container">
                <div class="row">
                    <main class="col-md-9 col-sm-12 col-xs-12 sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                        <!-- start post item --> 
                       
                    @foreach($articulos as $articulo)    

                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">
                            <div class="blog-text display-inline-block width-100">
                                <div class="content">
                                    <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase"><span><a href="#">{{ $articulo->user->name }}</a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>{{ Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y')}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">@lang('articulos.compartir')</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">@lang('articulos.tipoEncuestas')</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                    </span> @if($user->id == 1 ) <span>  <a  href="{{route('articulos.edit', $articulo->id)}}">@lang('articulos.editar')</a>   </span> @endif

                                      @if($user->id == 1)
                                             <form style="display: inline-block;" method="POST" action="/articulos/{{ $articulo->id }}">
                                                  {{ method_field('DELETE') }}
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                   &nbsp;&nbsp;&nbsp;<button>@lang('articulos.eliminar')</button>
                                             </form>            
                                      @endif  
                                   </div>
                                    <a href="{{route('articulos.show', $articulo->id)}}" class="text-extra-dark-gray text-uppercase text-large font-weight-600 margin-15px-bottom display-block"> {{$articulo->title}} </a>
                                      <p id="preview"> 
                                        @php
                                           $articulo->body = str_limit($articulo->body, 40);
                                           $articulo->body = str_finish($articulo->body, '...');
                                        @endphp
                                        {!! $articulo->body !!} 
                                    </p>
                                </div>
                                <div class="equalize xs-equalize-auto author display-table width-100">
                                    <div class="name col-md-6 col-sm-6">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <img src="images/mi-cuenta/user.png" alt="" class="border-radius-100 width-30px"><a href="#">{{ $articulo->user->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name col-md-6 col-sm-6">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <span class="text-extra-small margin-lr-auto"><i class="fa fa-calendar margin-5px-right"></i>{{ Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach   
                    
                    @if($articulos->count() > 0)
                    <div class="pag" align="right">
                            <p>Total de los artículos: {{ $articulos->count() }}</p>
                            Anterior&nbsp;&nbsp;-&nbsp;&nbsp;Siguiente<br>
                            {{ $articulos->links() }}
                    </div>
                    @endif 
                
         
                        <!-- end post item -->
                    </main>


                  @if(Auth::check() == true)  
                    @if($user->id == 1) 
                               <a href="{{route('articulos.create')}}" class="margin-30px-bottom xs-margin-25px-bottom btn btn-success">@lang('articulos.crearArticulo')</a>
                    @endif  
                 @endif   
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="display-inline-block width-100 margin-30px-bottom xs-margin-25px-bottom temas">
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
                                        </div5
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
                </div>
            </div>
        </section>
@stop


@push('script')

<script type="text/javascript">
        
$('#preview').trumbowyg('html');

</script>


@endpush
