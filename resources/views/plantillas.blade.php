@extends('layouts.master')
@section('title', 'Plantillas')

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
                            <h1 class="no-margin-bottom">@lang('plantillas.plantillas')</h1>
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
                                <li class="text-dark-gray">@lang('plantillas.plantillas')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->


        <!-- start icon with text style 02 section -->
        <section class="icons wow fadeIn bg-extra-dark-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <h5 class="text-extra-dark-gray font-weight-600">@lang('plantillas.plantillas')</h5>
                            <p class="text-extra-dark-gray center-col display-inline-block xs-width-100">@lang('plantillas.conSurveniaPuedes')</p>
                        </div>
                    </div>
                </div>
                <div class="row equalize xs-equalize-auto">
                    <!-- start features box item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center last-paragraph-no-margin margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.2s">                       
                        <img src="images/plantillas/i1.png" alt="">
                        <div class="margin-10px-bottom sm-margin-5px-bottom font-weight-600">@lang('plantillas.satisfaccionCliente')</div>
                        <p class="text-extra-dark-gray center-col xs-width-100">@lang('plantillas.conozcaOpiniones')</p>                      
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center last-paragraph-no-margin margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.4s">                       
                        <img src="images/plantillas/i2.png" alt="">
                        <div class="margin-10px-bottom sm-margin-5px-bottom font-weight-600">@lang('plantillas.climaLaboral')</div>
                        <p class="text-extra-dark-gray center-col xs-width-100">@lang('plantillas.ayudeAmejorarAmbiente')</p>                      
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center last-paragraph-no-margin margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.6s">                       
                        <img src="images/plantillas/i3.png" alt="">
                        <div class="margin-10px-bottom sm-margin-5px-bottom font-weight-600">@lang('plantillas.planificacionEventos')</div>
                        <p class="text-extra-dark-gray center-col xs-width-100">@lang('plantillas.creeEncuestaSobrePlanificacion')</p>                      
                    </div>                                        
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col-md-offset-2 col-md-4 col-sm-6 col-xs-12 text-center last-paragraph-no-margin sm-margin-40px-bottom xs-margin-30px-bottom wow fadeInUp" data-wow-delay="0.8s">                       
                        <img src="images/plantillas/i4.png" alt="">
                        <div class="margin-10px-bottom sm-margin-5px-bottom font-weight-600">@lang('plantillas.educacionEscuelas')</div>
                        <p class="text-extra-dark-gray center-col xs-width-100">@lang('plantillas.genereEncuestas')</p>                      
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center last-paragraph-no-margin xs-margin-30px-bottom wow fadeInUp" data-wow-delay="1s">                       
                        <img src="images/plantillas/i5.png" alt="">
                        <div class="margin-10px-bottom sm-margin-5px-bottom font-weight-600">@lang('plantillas.investigacionDeMercado')</div>
                        <p class="text-extra-dark-gray center-col xs-width-100">@lang('plantillas.determineCualEsElPrecio')</p>                      
                    </div> 
                    <!-- end features box item -->
                </div>
            </div>
        </section>
        <!-- end icon with text style 02 section -->

        
        <!-- start accordions style 04 section -->
        <section class="wow fadeIn accordion no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center">
                        <div class="position-relative overflow-hidden width-100">
                            <h5 class="text-extra-dark-gray font-weight-600">@lang('plantillas.plantillasDisponibles')</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- start accordion -->
                        <div class="panel-group accordion-style4" id="accordion-main">
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading active-accordion">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseOne">
                                        <div class="panel-title">
                                            <span class="tab-tag">01</span>
                                            <span class="xs-width-80 display-inline-block">@lang('plantillas.satisfaccionAlCliente')</span>
                                            <i class="fa fa-angle-up pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') (general)</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') – Hotel</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') – @lang('plantillas.restaurante')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') - @lang('plantillas.servicioTransporte')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') – @lang('plantillas.servicioAtencionCliente')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') – @lang('plantillas.centroMedico')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionCliente') – @lang('plantillas.entidadBancaria')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapseTwo">
                                        <div class="panel-title">
                                            <span class="tab-tag">02</span>
                                            <span class="xs-width-80 display-inline-block">@lang('plantillas.climaLaboral')</span>
                                            <i class="indicator fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">@lang('plantillas.formacionProfesional')</a></li>
                                            <li><a href="#">@lang('plantillas.entrevistaSalida')</a></li>
                                            <li><a href="#">@lang('plantillas.climaLaboral')</a></li>
                                            <li><a href="#">@lang('plantillas.evaluacionEmpleado')</a></li>
                                            <li><a href="#">@lang('plantillas.evaluacion') 360º</a></li>
                                            <li><a href="#">@lang('plantillas.conciliacionVidaLaboral')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionEmpleado')</a></li>
                                            <li><a href="#">@lang('plantillas.valoracionDepartamentos')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- start accordion -->
                        <div class="panel-group accordion-style4" id="accordion-main2">
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main2" href="#collapseThree">
                                        <div class="panel-title">
                                            <span class="tab-tag">03</span>
                                            <span class="xs-width-80 display-inline-block">@lang('plantillas.planificacionEventos')</span>
                                            <i class="indicator fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">@lang('plantillas.planificacionEventos') </a> </li>
                                            <li><a href="#">@lang('plantillas.evaluacionEvento')</a></li>
                                            <li><a href="#">@lang('plantillas.eficaciaReunion')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main2" href="#collapse4">
                                        <div class="panel-title">
                                            <span class="tab-tag">04</span>
                                            <span class="xs-width-80 display-inline-block">@lang('plantillas.educacionEscuelas')</span>
                                            <i class="indicator fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">@lang('plantillas.evaluacionCurso')</a></li>
                                            <li><a href="#">@lang('plantillas.evaluacionProfesor')</a></li>
                                            <li><a href="#">@lang('plantillas.formularionInscripcion')</a></li>
                                            <li><a href="#">@lang('plantillas.satisfaccionProfesor')</a></li>
                                            <li><a href="#">@lang('plantillas.evaluacionAsignatura')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main2" href="#collapse5">
                                        <div class="panel-title">
                                            <span class="tab-tag">05</span>
                                            <span class="xs-width-80 display-inline-block">@lang('plantillas.investigacionDeMercado')</span>
                                            <i class="indicator fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">@lang('plantillas.lanzamientoServicio')</a></li>
                                            <li><a href="#">@lang('plantillas.evaluacionComunicacionInterna')</a></li>
                                            <li><a href="#">@lang('plantillas.testProducto')</a></li>
                                            <li><a href="#">@lang('plantillas.lanzamientoProducto')</a></li>
                                            <li><a href="#">Test @lang('plantillas.de') @lang('plantillas.concepto')</a></li>
                                            <li><a href="#">Test @lang('plantillas.de')  @lang('plantillas.nombre') </a></li>
                                            <li><a href="#">Test @lang('plantillas.de') @lang('plantillas.precio') </a></li>
                                            <li><a href="#">@lang('plantillas.imagen') @lang('plantillas.de') @lang('plantillas.marca')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end accordion -->
                    </div>
                </div>
            </div>
        </section>
@stop