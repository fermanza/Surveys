@extends('layouts.master')
@section('title', 'Como Funciona')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('como_funciona.comoFunciona')</h1>
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
                                <li class="text-dark-gray">@lang('como_funciona.comoFunciona')</li>
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
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">@lang('como_funciona.disenaTuEncuesta')</h5>
                        <p>@lang('como_funciona.luegoDeRegistrarte') </p>
                    </div>  
                </div>
            </div>
        </section>
        <!-- end form section -->
        <section class="crea">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-6">
                        <h6>@lang('como_funciona.creaTuEncuesta')</h6>
                        <p>@lang('como_funciona.puedesEscogerEntreUnaVariedad')
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="proceso">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h6>@lang('como_funciona.elprocesoSencillo')</h6>
                        <ul class="fa-ul">
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.eligeUnaPlantilla')</div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.siLoDeseasPuedes')</div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.estableceTitulo')</div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.insertaLasPreguntas') </div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.puedesConfigurar') </div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.puedesDefinir') </div></li>
                            <li><i class="fa fa-check"></i> <div>@lang('como_funciona.tienesSiempreLaOpcion')</div></li>
                        </ul>
                        <p>@lang('como_funciona.esoEsTodo')</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="calculadora">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>@lang('como_funciona.siNecesitasAyuda')</p>
                        <a href="#" class="btn">@lang('como_funciona.calculadora')</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="distri">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <h6>@lang('como_funciona.distribuyeTuEncuesta')</h6>
                    <p> @lang('como_funciona.tanProntoComoActives') </b>
                    </p>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                </div>
            </div>
        </section>
        <section class="analiza">
            <div class="row">
                <div class="col-md-6 col-sm-4 col-xs-12">
                </div>
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <h6>@lang('como_funciona.analizaResultados') </h6>
                    <p>@lang('como_funciona.puedesEmpezarAnalizar') </p>
                </div>
            </div>
        </section>
@stop