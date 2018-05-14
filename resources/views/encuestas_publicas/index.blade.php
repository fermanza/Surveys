@extends('layouts.master')
@section('title', 'Encuestas Públicas')

@extends('includes.header')

@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Encuestas Públicas</h1>
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
                                <li class="text-dark-gray">Encuestas Públicas</li>
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
                	<aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="display-inline-block width-100 margin-30px-bottom xs-margin-25px-bottom temas">
                            <div class="title">Reportes</div>
                            <form>
                                <div class="select-style big-select">
                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                         <option value="">Seleccionar Tipo de reporte</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="select-style big-select">
                                    <select name="budget2" id="budget2" class="bg-transparent no-margin-bottom">
                                         <option value="">Seleccionar por categoría</option>
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
                                <form id="project-contact-form" action="javascript:void(0)" method="post">
                                    <div class="row">
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
                                            <label for="check" class="text-extra-dark-gray">Acepto los <a href="terminos-condiciones.php">Términos y condiciones</a></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="button" name="ingresar" id="ingresar" value="Crear encuesta">
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-extra-dark-gray">Para obtener mas potencia<br><a href="planes.php">Ver planes premium</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </aside>
                    <main class="col-md-9 col-sm-12 col-xs-12 sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                        <h3>Encuestas destacadas</h3>
                        <!-- start post item --> 
                        @foreach($templates as $template)
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">                        
                            <div class="blog-text display-inline-block width-100">
                                <div class="content">
                                    <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase"><span>{{ $template->user->name }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>{{ $template->created_at->diffForHumans() }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">Compartir</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="">Tipo de encuestas</a></span></div>
                                    <a href="{{ URL('encuestas/responder') }}/{{ $template->id }}" class="text-extra-dark-gray text-uppercase text-large font-weight-600 margin-15px-bottom display-block">{{ $template->name }}</a>
                                    <p>{{ $template->description }}</p>
                                </div>
                                <div class="equalize xs-equalize-auto author display-table width-100">
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="#" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-bar-chart margin-5px-right"></i>Reporte simple</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="#" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-pie-chart margin-5px-right"></i>Reporte avanzado</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="#" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-file-o margin-5px-right"></i>Exportar reporte</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end post item -->
                        <div class="pag">
                            <p>Total de las encuestas: 4 de 17</p>
                            <div align="left">
                                <a href="#">Anterior</a>
                            </div>
                            <div align="right">
                                <a href="#">Siguiente</a>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </section>
        <!-- end blog content section -->
        <section class="disclaimer">
            <div class="container">
            <p> <img src="images/encuestas/warning.png" alt="" width="40px" height="40px"> Survenia no valida ni verifica la metodología utilizada por los usuarios para confeccionar la encuesta y recolectar datos, sólo brinda el espacio para que los mismos puedan publicar sus trabajos.</p>
            </div>
        </section>
@stop