@extends('layouts.master')
@section('title', 'Registrarse')

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
                            <h1 class="no-margin-bottom">@lang('registro.registrarse')</h1>
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
                                <li class="text-dark-gray">@lang('registro.registrarse')</li>
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
        <section class="wow fadeIn registro-form login-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray">@lang('registro.crearCuenta')</h5>
                    </div>  
                    <div class="col1 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin" style="border-right:1px solid rgba(0,0,0,0.1);">

                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-extra-dark-gray">@lang('registro.paraCrearNuevaCuenta')</h6>
                                </div>
                                 <div class="col-md-12">
                                    <div id="success-project-contact-form" class="no-margin-lr"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" align="left">* @lang('registro.nombre'): </label>
                                    <input type="text" name="name" id="name" value="{{ old('name')}}">
                                    @if ($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" align="left">* @lang('registro.apellido'): </label>
                                    <input type="text" name="last_name" id="lastName">
                                </div>
                                <div class="col-md-12">
                                    <label for="email" align="left">* E-mail: </label>
                                    <input type="email" name="email" id="email">
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="password" align="left">* @lang('registro.contra'): </label>
                                     <input type="password" name="password" id="password" required>
                                     @if ($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" align="left">* @lang('registro.repetir') @lang('registro.contra'): </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="direccion" align="left">* @lang('registro.direccion'): </label>
                                    <input type="text" name="address" id="direccion">
                                </div>
                                <div class="col-md-6">
                                    <label for="ciudad" align="left">* @lang('registro.ciudad'): </label>
                                    <input type="text" name="city" id="ciudad">
                                </div>
                                <div class="col-md-6">
                                    <label for="pais" align="left">* @lang('registro.pais'): </label>
                                    <input type="text" name="country" id="pais">
                                </div>
                                <div class="col-md-6">
                                    <label for="empresa" align="left">* @lang('registro.empresa') </label>
                                    <input type="text" name="company" id="empresa">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" align="left">* @lang('registro.telefono'): </label>
                                    <input type="text" name="phone" id="telefono">
                                </div>
                                <div class="col-md-12">
                                   <button type="submit" class="btn btn-success">@lang('registro.crearCuenta')</button>

                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="col2 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-extra-dark-gray">@lang('registro.tambienPuedesRegistrarte')</h6>
                            </div>
                            <div class="col-md-12">
                                <p class="text-extra-dark-gray">@lang('registro.rapidoFacilSeguro').</p>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <a href="{{ route('social.auth', 'facebook') }}"><i class="fa fa-facebook"></i> @lang('registro.ingresarFace')</a>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('redirectSocialLite', ['provider' => 'google']) }}" class="google"><i class="fa fa-google"></i> @lang('registro.ingresarGoogle')</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end form section -->
        <section class="term">
            <div class="container">
                <p>@lang('registro.alCrearUnaCuenta') <a href="{{ URL('terminos')}}">@lang('registro.terminos')</a> @lang('registro.yLas') <a href="terminos-condiciones.php">@lang('registro.politicas')</a>.<br>
               @lang('registro.aceptaRecibirCorreos')</p>
            </div>
        </section>
@stop