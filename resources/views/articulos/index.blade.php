@extends('layouts.master')
@section('title', 'Artículos')

@extends('includes.header')
@section('content')

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
                                <li><a href="index.php" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li class="text-dark-gray">Art&iacute;culos</li>
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
                                    <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase"><span><a href="#">{{ $articulo->user->name }}</a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>{{ $articulo->created_at }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">Compartir</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">Tipo de encuestas</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                    </span> @if($user->id == 1 ) <span>  <a  href="{{route('articulos.edit', $articulo->id)}}">Editar</a>   </span> @endif

                                      @if($user->id == 1)
                                             <form style="display: inline-block;" method="POST" action="/articulos/{{ $articulo->id }}">
                                                  {{ method_field('DELETE') }}
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                   &nbsp;&nbsp;&nbsp;<button>Eliminar</button>
                                             </form>            
                                      @endif  
                                   </div>
                                    <a href="{{route('articulos.show', $articulo->id)}}" class="text-extra-dark-gray text-uppercase text-large font-weight-600 margin-15px-bottom display-block"> {{$articulo->title}} </a>
                                      <p id="preview"> 
                                        @php
                                           $articulo->body = str_limit($articulo->body, 300);
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
                                                <span class="text-extra-small margin-lr-auto"><i class="fa fa-calendar margin-5px-right"></i>{{ $articulo->created_at }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach    
         
                        <!-- end post item -->
                    </main>
                    @if($user->id == 1) 
                               <a href="{{route('articulos.create')}}" class="margin-30px-bottom xs-margin-25px-bottom btn btn-primary">Crear Artículo</a>
                             @endif  
                    <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="display-inline-block width-100 margin-30px-bottom xs-margin-25px-bottom temas">
                            <div class="temas-title">Temas</div>
                            <form>
                                <div class="select-style big-select">
                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                         <option value="">Seleccionar categoría</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="buscar position-relative">
                                    <input type="text" class="bg-transparent no-margin border-color-extra-light-gray medium-input pull-left" placeholder="Buscar">
                                    <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1"><i class="fa fa-search no-margin-left"></i></button>
                                </div>  
                            </form>
                        
                        </div>         
                        <div class="margin-30px-bottom xs-margin-25px-bottom reg">
                            <div class="display-inline-block width-100">
                                <h6>¿Querés crear tu propia encuesta?</h6>
                                <p>Suscríbete gratis</p>
                                <form method="POST" action="{{ URL('register') }}">
                                    {{ csrf_field() }}
                                    <div class="row" align="center">
                                        <div class="col-md-12">
                                            <input type="text" name="name" id="name" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="email" name="email" id="email" placeholder="E-mail">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="password" name="password" id="password" placeholder="Contraseña">
                                        </div>
                                        <div class="col-md-12" style="text-align:left;">
                                            <input type="checkbox" id="check">
                                            <label for="check" class="text-extra-dark-gray">Acepto los <a href="{{ URL('terminos')}}">Términos y condiciones</a></label>
                                        </div>
                                        <div class="col-md-12">
                                             <br><button type="submit">CREAR CUENTA</button>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-extra-dark-gray"><br>Para obtener mas potencia<br><a href="{{ URL('planes')}}">Ver planes premium</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="margin-45px-bottom xs-margin-25px-bottom archivo">
                            <div class="text-extra-dark-gray margin-20px-bottom text-uppercase">Archivo</div>
                            <ul class="list-style-6 margin-50px-bottom text-small">
                                <li><a href="#"><i class="fa fa-calendar"></i> Octubre 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Septiembre 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Agosto 2017</a></li>
                                <li><a href="#"><i class="fa fa-calendar"></i> Julio 2017</a></li>
                            </ul>   
                        </div>
                        
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
