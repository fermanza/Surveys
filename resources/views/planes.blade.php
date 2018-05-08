@extends('layouts.master')
@section('title', 'Planes y Precios')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Planes y Precios</h1>
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
                                <li class="text-dark-gray">Planes y Precios</li>
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
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">Planes y precios</h5>
                        <p>En Survenia tenemos dos tipos de servicio: Gratuito y Premium.</p>
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
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom text-uppercase">Servicio Gratuito</div>
                                <p>El Servicio Gratuito te permitirá conocer nuestra herramienta, cuenta con un número limitado de preguntas y respuestas pero las funciones disponibles son las mismas que las del Servicio Premium.</p>
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
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom text-uppercase">Servicio Premium</div>
                                <p>El Servicio Premium de Survenia no tiene ningún tipo de limitaciones y se distingue en el mercado porque no te cobramos suscripciones mensuales o anuales cuando no es eso lo que necesitas. </p>
                            </div>
                        </div>
                    </div>
                    <!-- end features item -->
                </div>
            </div>
        </section>
        <!-- end section -->

        <section class="green-planes">
            <p>Con Survenia puedes adquirir la cantidad de encuestas que quieras, sin pagar de más.</p>
        </section>

        <section class="tabla-planes">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Servicio Gratuito</th>
                              <th scope="col">Servicio Premium</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Precio</th>
                              <td><b>GRATIS</b></td>
                              <td><b>3 USD/Encuesta</b></td>
                            </tr>
                            <tr>
                              <th scope="row">Target</th>
                              <td>Para encuestas pequeñas y sencillas, o simplemente para probar nuestro sistema.</td>
                              <td>Para encuestas profesionales de corto, mediano y largo plazo.</td>
                            </tr>
                            <tr>
                              <th scope="row">Número de preguntas</th>
                              <td>Máx. 10</td>
                              <td>Ilimitado</td>
                            </tr>
                            <tr>
                              <th scope="row">Número de respuestas</th>
                              <td>Máx. 100</td>
                              <td>Ilimitado</td>
                            </tr>
                            <tr>
                              <th scope="row">Soporte en línea gratuito</th>
                              <td>-</td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Sin contrato o renovación automática</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Tipos de pregunta variados</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Secuencia lógica (si... entonces...)</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Fotos, imágenes e ilustraciones</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Diseño individual del cuestionario</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Inserte su propio logotipo</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Optimizado para móviles, para participantes desde teléfonos inteligentes y tabletas</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Protección por contraseña para participar en la encuesta</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>                            
                            <tr>
                              <th scope="row">Diversas medidas para impedir participaciones múltiples</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Limitar tiempo para participar en la encuesta</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Evaluación automática en línea en tiempo real, incluyendo tabulación cruzada</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Descargar preguntas como PDF y archivo de Microsoft Excel™</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Publicar/compartir los resultados de su encuesta en línea directamente con un enlace</th>
                              <td><img src="images/planes/check.png" alt=""></td>
                              <td><img src="images/planes/check-w.png" alt=""></td>
                            </tr>
                            <tr>
                              <th scope="row">Filtrar resultados por contenido dinámico</th>
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
                        <a href="#">Registrarse</a>
                        <a href="#">Ver planes de descuentos por créditos</a>
                    </div>
                    <div class="col-md-4 col-md-offset-8">
                        <a href="#">Contratar</a>
                    </div>
                </div>
            </div>
            
        </section>
@stop