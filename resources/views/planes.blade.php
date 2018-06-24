@extends('layouts.master')
@section('title', 'Planes y Precios')

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
                            <h1 class="no-margin-bottom">@lang('home.planesPrecios') </h1>
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
                                <li class="text-dark-gray">@lang('home.planesPrecios')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <!-- start form section -->
        <section class="wow fadeIn contacto" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">@lang('home.planesPrecios')</h5>
                        <p>@lang('home.enSurveniaTenemos')</p>
                    </div>  
                </div>
            </div>
        </section>
        <!-- end form section -->
        
        <!-- start section -->
        <section class="no-padding wow fadeIn animated">
            <div class="container-fluid">
                <div class="row equalize sm-equalize-auto">
                    <!-- start features item -->
                    <div class="col-md-3 no-padding cover-background position-relative sm-height-500px xs-height-300px wow fadeIn" style="background: url('images/planes/f1.jpg');background-size: cover;"></div>
                    <!-- end features item -->
                    <!-- start features item -->
                    <div class="eq-info col-md-3 no-padding position-relative wow fadeIn sm-text-center" data-wow-delay="0.2s">
                        <div class="display-table width-100 height-100">
                            <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all xs-padding-30px-all">
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom text-uppercase">@lang('home.servicioGratuito')</div>
                                <p>@lang('home.elServicioGratuito')</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features item -->
                    <!-- start features item -->
                    <div class="col-md-3 no-padding cover-background position-relative sm-height-500px xs-height-300px wow fadeIn" data-wow-delay="0.4s" style="background: url('images/home/p2.jpg');background-size: cover;"></div>
                    <!-- end features item -->
                    <!-- start features item -->
                    <div class="eq-info col-md-3 no-padding position-relative wow fadeIn sm-text-center" data-wow-delay="0.6s">
                        <div class="display-table width-100 height-100">
                            <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all xs-padding-30px-all">
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom text-uppercase">@lang('home.servicioPremium')</div>
                                <p>@lang('home.elServicioPremiumDeSurvenia')</p>
                            </div>
                        </div>
                    </div>
                    <!-- end features item -->
                </div>
            </div>
        </section>
        <!-- end section -->

        <section class="green-planes">
            <p>@lang('home.conSurveniapPuedesAdquirir')</p>
        </section>

        <section class="tabla-planes">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">@lang('home.servicioGratuito')</th>
                              <th scope="col">@lang('home.servicioPremium')</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">@lang('home.precio')</th>
                              <td><b>@lang('home.gratisM') </b></td>
                              <td><b>3 USD/@lang('home.encuesta')</b></td>
                            </tr>
                            <tr>
                              <th scope="row">Target</th>
                              <td>@lang('home.paraEncuestasSencillas')</td>
                              <td>@lang('home.paraEncuestasProfesionales')</td>
                            </tr>
                            <tr>
                              <th scope="row"></th>
                              <td>Máx. 10</td>
                              <td>@lang('home.ilimitadas')</td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.numeroDeRespuestas')</th>
                              <td>Máx. 100</td>
                              <td>@lang('home.ilimitadas')</td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.soporteEnLinea')</th>
                              <td>-</td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.sinContrato')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.tiposDePreguntas')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.secuenciaLogica')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.fotosImagenes')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.disenoIndividual')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.inserteSuPropioLogo')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.optimizadoParaMoviles')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.proteccionPorContra')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>                            
                            <tr>
                              <th scope="row">@lang('home.diversasMedidas')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.limitarTiempo')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.evaluacionAutomatica')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.descargarPreguntasComoPdf')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.publicarCompartir')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">@lang('home.filtrarResultados')</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row"></th>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md-8 col-md-offset-4">
                        <a href="{{ URL('registro') }}">@lang('home.registrarse')</a>
                        <a href="#">@lang('home.verPlanes')</a>
                    </div>
                    <div class="col-md-4 col-md-offset-8">
                        <a href="{{ URL('creditos') }}">@lang('home.contratar')</a>
                    </div>
                </div>
            </div>
            
        </section>
@stop