@extends('layouts.master')
@section('title', 'Mi cuenta / Gestión de créditos')

@extends('includes.headercuenta')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Mi cuenta</h1>
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
                                <li class="text-dark-gray">Gestión de créditos</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <section class="titulo">

            <div class="container">
                <div class="row">
                    <h5 class="title text-extra-dark-gray text-center">Gestión de créditos</h5>
                    <p class="text-extra-dark-gray text-center">Cada crédito equivale a una encuesta que podrás crear. Mientras más créditos sumes a tu cartera más ahorras.</p> 
                </div>
            </div>
        </section>


        <!-- start pricing section -->
        <section class="wow fadeIn planes">
            <div class="container">                
                <div class="row">
                    <div class="pricing-box-style1">
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it1.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">1</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 0%<br>
                                            <b>USD 3,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it2.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">10</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 15%<br>
                                            <b>USD 25,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box active border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it3.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">50</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 25%<br>
                                            <b>USD 112,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it4.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">100</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 35%<br>
                                            <b>USD 195,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it5.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">250</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 45%<br>
                                            <b>USD 412,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-2 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pricing-box border-all border-width-1 border-color-extra-light-gray">
                                <div class="sm-padding-30px-all xs-padding-40px-all">
                                    <!-- start pricing title -->
                                    <div class="pricing-title text-center">
                                        <img src="images/mi-cuenta/it6.png" alt="">
                                    </div>
                                    <!-- end pricing title -->
                                    <!-- start pricing price -->
                                    <div class="pricing-price">
                                        <h4 class="text-extra-dark-gray no-margin-bottom">500</h4>
                                        <div class="text-extra-small text-black margin-20px-top">Ahorra un 60%<br>
                                            <b>USD 600,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="#" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end pricing section -->

        <section class="usuario">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/mi-cuenta/user.png" alt="">
                        <p>Nombre de usuario</p>
                        <p>Créditos disponibles 20</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text">
            <div class="container">
                <div class="row">
                    <p class="text-center">Los créditos duran un año a partir de la compra<br>
                        No se renuevan automáticamente; simplemente, compra más cuando lo necesites.<br>
                    Cada encuesta creada cuesta 1 crédito</p>
                </div>
            </div>
        </section>

        <section class="cuenta">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p1">
                        <div>
                            <img src="images/mi-cuenta/i2.png" alt="">
                            <div>
                                <p><b>Tipo de plan</b></p>
                                <p>GRATUITO (cuenta básica)</p>
                            </div>
                        </div>
                        <a href="#"><i class="fa fa-caret-right"></i> Ampliar</a>
                    </div>
                </div>
            </div>
        </section>
@stop