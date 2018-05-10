@extends('layouts.master')
@section('title', 'Registrarse')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Registrarse</h1>
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
                                <li class="text-dark-gray">Registrarse</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <!-- start form section -->
        <section class="wow fadeIn registro-form login-form" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray">Crear cuenta</h5>
                    </div>  
                    <div class="col1 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin" style="border-right:1px solid rgba(0,0,0,0.1);">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-extra-dark-gray">Para crear una nueva cuenta, completar el formulario a continuación</h6>
                                </div>
                                 <div class="col-md-12">
                                    <div id="success-project-contact-form" class="no-margin-lr"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" align="left">* Nombre: </label>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" align="left">* Apellido: </label>
                                    <input type="text" name="last_name" id="lastName">
                                </div>
                                <div class="col-md-12">
                                    <label for="email" align="left">* E-mail: </label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" align="left">* Clave de acceso: </label>
                                    <input type="password" name="password" id="password">
                                </div>
                                <div class="col-md-6">
                                    <label for="password2" align="left">* Repetir clave de acceso: </label>
                                    <input type="password" name="password2" id="password2">
                                </div>
                                <div class="col-md-12">
                                    <label for="direccion" align="left">* Direcci&oacute;n: </label>
                                    <input type="text" name="address" id="direccion">
                                </div>
                                <div class="col-md-6">
                                    <label for="ciudad" align="left">* Ciudad: </label>
                                    <input type="text" name="city" id="ciudad">
                                </div>
                                <div class="col-md-6">
                                    <label for="pais" align="left">* Pa&iacute;s: </label>
                                    <input type="text" name="country" id="pais">
                                </div>
                                <div class="col-md-6">
                                    <label for="empresa" align="left">* Empresa </label>
                                    <input type="text" name="company" id="empresa">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefono" align="left">* Tel&eacute;fono: </label>
                                    <input type="text" name="phone" id="telefono">
                                </div>
                                <div class="col-md-12">
                                   <button type="submit" class="btn btn-success">CREAR CUENTA</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col2 col-lg-6 col-md-6 sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-extra-dark-gray">También podes registrarte usando tu cuenta de Facebook o Google</h6>
                            </div>
                            <div class="col-md-12">
                                <p class="text-extra-dark-gray">Es rápido, fácil y seguro; sus datos y encuestas son completamente privados.</p>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('social.auth', 'facebook') }}"><i class="fa fa-facebook"></i> Ingresar con Facebook</a>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ route('redirectSocialLite', ['provider' => 'google']) }}" class="google"><i class="fa fa-google"></i> Ingresar con Google</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end form section -->
        <section class="term">
            <div class="container">
                <p>Al crear una cuenta, confirma que está de acuerdo con los <a href="terminos-condiciones.php">Términos y condiciones</a> y las <a href="terminos-condiciones.php">Políticas de privacidad</a>.<br>
                También acepta recibir correos electrónicos con noticias y sugerencias.</p>
            </div>
        </section>
@stop