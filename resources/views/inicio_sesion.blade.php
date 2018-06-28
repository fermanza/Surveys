@extends('layouts.master')
@section('title', 'Login')

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
                            <h1 class="no-margin-bottom">Login</h1>
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
                                <li class="text-dark-gray">Login</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        @include('flash::message')
        <!-- start form section -->
        <section class="wow fadeIn login-form" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray">Login</h5>
                    </div>  
                    <div class="col1 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin" style="border-right:1px solid rgba(0,0,0,0.1);">
                        <form class="form-horizontal" method="POST" action="{{ URL('iniciarsesion') }}">
                        {{ csrf_field() }}
                            <div class="row">
                                 <div class="col-md-12">
                                    <div id="success-project-contact-form" class="no-margin-lr"></div>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" id="email" placeholder="E-mail *">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" name="password" id="password" placeholder="@lang('login.contra') *">
                                </div>
                                <div class="col-md-6 col-sm-6" style="text-align:left;">
                                    <input type="checkbox" id="check">
                                    <label for="check" class="text-extra-dark-gray">@lang('login.recordarme')</label>
                                </div>
                                <div class="col-md-6 col-sm-6" style="text-align:right;">
                                    <a href="{{ route('password.request') }}" class="text-extra-dark-gray">@lang('login.recuperarContra')</a>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                    Login</button>
                                </div>
                                <div class="col-md-12"><br>
                                    <p class="text-extra-dark-gray cuenta">@lang('login.noTienesCuenta') <a href="{{ URL('registro') }}">@lang('login.registrarse')</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col2 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('social.auth', 'facebook') }}"><i class="fa fa-facebook"></i> @lang('login.ingresarFace')</a>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('redirectSocialLite', ['provider' => 'google']) }}" class="google"><i class="fa fa-google"></i> @lang('login.ingresarGoogle')</a>
                            </div>
                            <div class="col-md-12">
                                <p class="text-extra-dark-gray">@lang('login.esRapidoFacil')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end form section -->
        
@stop