@extends('layouts.master')
@section('title', 'Mi Cuenta')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Editar Mi cuenta</h1>
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
                                <li class="text-dark-gray"><a href="mi-cuenta.php">Mi cuenta</a></li>
                                <li class="text-dark-gray">Datos personales</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <section class="cuenta">

            <div class="container">
                <div class="row">
                    <h5 class="title text-extra-dark-gray">Detalle de la cuenta</h5> 
                </div>
                <div class="row">
                    <div class="col-md-12 p1">
                        <div>
                            <img src="images/mi-cuenta/i1.png" alt="">
                            <div>
                                <p><b>Tipo de plan</b></p>
                                <p>GRATUITO (cuenta básica)</p>
                            </div>
                        </div>
                        <a href="#"><i class="fa fa-caret-right"></i> Ampliar</a>
                    </div>
                    <div class="col-md-12 p2">
                        <div class="cuenta-col">
                            <div>
                                <div class="item">
                                    <h6>Nombre</h6>
                                    <p>Juan Manuel <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>Apellido</h6>
                                    <p>Perez <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>Empresa</h6>
                                    <p>Nombre de la Empresa <a href="#">Editar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="cuenta-col">
                            <div>
                                <div class="item">
                                    <h6>E-mail</h6>
                                    <p>Juan Manuel <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>Clave de acceso</h6>
                                    <p>******* <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>Dirección</h6>
                                    <p>Av. Del Libertador 3840 5ºA <a href="#">Editar</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="cuenta-col">
                            <div>
                                <div class="item">
                                    <h6>Teléfono</h6>
                                    <p>(011) 4659-3023 <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>Ciudad</h6>
                                    <p>Capital Federal <a href="#">Editar</a></p>
                                </div>
                                <div class="item">
                                    <h6>País</h6>
                                    <p>Argentina <a href="#">Editar</a></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
@stop