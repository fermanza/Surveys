@extends('layouts.master')
@section('title', 'Calculadora')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Cómo funciona</h1>
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
                                <li><a href="como-funciona.php" class="text-dark-gray">Cómo funciona</a></li>
                                <li class="text-dark-gray">Calculadora de tamaño de muestra</li>
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
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">Calculadora de tamaño de muestra</h5>
                        <p>¿Cuántas personas deben responder tu encuesta?<br>
                            Calcula el tamaño de muestra que necesitas cuando tu encuesta mide un porcentaje o proporción<br>
                        (por ejemplo, el % de personas que fuman en la población).</p>
                    </div>  
                </div>
            </div>
        </section>
        <!-- end form section -->
        <section class="inst">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><b>Para usar la calculadora:</b></p>
                        <p><i class="fa fa-check"></i> Indica el tamaño del universo, el margen de error y el nivel de confianza.</p>
                        <p><i class="fa fa-check"></i> Pulsa en CALCULAR. El valor calculado quedará destacado.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="calc">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <p>¿Cuál es el tamaño de la población?<br>
                            <i>Si no lo sabe use 20000</i>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="2000">
                    </div>
                    <div class="col-md-7">
                        <p><b>¿Cuál es la población a la que desea testear?</b> La cantidad total de personas en el grupo al que intentas llegar con tu encuesta. El tamaño de la muestra no se altera significativamente para poblaciones mayores de 20000.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>¿Qué porcentaje de error quiere aceptar?<br>
                            <i>5% es lo más común</i>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="5"><p>%</p>
                    </div>
                    <div class="col-md-7">
                        <p>Un porcentaje que describe qué tanto se acerca la respuesta que dio tu muestra al “valor real” en tu población. Mientras más pequeño es el margen de error, más cerca estás de tener la respuesta correcta dado cierto nivel de confianza.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>¿Qué nivel de confianza desea?<br>
                            <i>Las elecciones comunes son 90%, 95% ó 99%</i>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="95"><p>%</p>
                    </div>
                    <div class="col-md-7">
                        <p>El nivel de confianza es el monto de incertidumbre que usted está dispuesto a tolerar. Por lo tanto mientras mayor sea el nivel de certeza más alto deberá ser este número, por ejemplo 99%, y por tanto más alta será la muestra requerida.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p>La muestra recomendada es de:
                        </p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" placeholder="377">
                    </div>
                    <div class="col-md-7">
                        <p>Este es el monto mínimo de personas a testear para obtener una muestra con el nivel de confianza deseada y el nivel de error deseado.</p>
                    </div>
                </div>
                <a href="#" class="btn">Calcular</a>
            </div>
        </section>
        <section class="formula">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Si deseas hacer el cálculo del tamaño de la muestra a mano, Usa la siguiente fórmula:</p>
                        <div>
                            <p><b>Tamaño de la muestra =</b></p>
                            <img src="images/calculadora/formula.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p><b>Tamaño de la población</b> = N | Margen de error = e | puntuación z = z e es un porcentaje, debe estar expresado con decimales (por ejemplo, 3 % = 0.03). La <b>puntuación</b> z es la cantidad de desviaciones estándar que una proporción dada se aleja de la media.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="puntuacion">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="font-weight-700 text-extra-dark-gray text-center">Para encontrar la puntuación z adecuada, consulta la tabla a continuación:</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="punt">
                        <p>Nivel de confianza deseado</p>
                        <img src="images/calculadora/i1.png" alt="">
                        <h6>80%</h6>
                        <p><b>Puntuación z</b><br>
                        1.28</p>
                    </div>
                    <div class="punt">
                        <p>Nivel de confianza deseado</p>
                        <img src="images/calculadora/i2.png" alt="">
                        <h6>85%</h6>
                        <p><b>Puntuación z</b><br>
                        1.44</p>
                    </div>
                    <div class="punt">
                        <p>Nivel de confianza deseado</p>
                        <img src="images/calculadora/i3.png" alt="">
                        <h6>90%</h6>
                        <p><b>Puntuación z</b><br>
                        1.65</p>
                    </div>
                    <div class="punt">
                        <p>Nivel de confianza deseado</p>
                        <img src="images/calculadora/i4.png" alt="">
                        <h6>95%</h6>
                        <p><b>Puntuación z</b><br>
                        1.96</p>
                    </div>
                    <div class="punt">
                        <p>Nivel de confianza deseado</p>
                        <img src="images/calculadora/i5.png" alt="">
                        <h6>99%</h6>
                        <p><b>Puntuación z</b><br>
                        2.58</p>
                    </div>
                </div>

            </div>
        </section>
@stop