@extends('layouts.master')
@section('title', 'Mi Cuenta')

@extends('includes.header')
@section('content')
<style>
.btn{
   padding:10px 0px;
}
.p1 {
    background: none;
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 5px;
    padding:15px;
}
.p1 img {
    width: 40px;
    float: left;
    margin-left: 15px;
}
.p1 a {
    background: #5ba01f;
    border: 2px solid #5ba01f;
}
.p1 a {
    float: right;
    color: #fff;
    display: inline-block;
    padding: 10px 20px;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 16px;
    
    margin-top: 10px;
}
.micuenta .cuenta .p1 > div > div {
    float: left;
}
</style>
<div class="micuenta micuenta2">
<section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('creditos.miCuenta')</h1>
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
                                <li class="text-dark-gray"><a href="mi-cuenta.php">@lang('creditos.miCuenta')</a></li>
                                <li class="text-dark-gray">@lang('creditos.gestionCreditos')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        @if($msgError!="")
        <div class="alert alert-danger">
            <strong>{{$msgError}}</strong>
        </div>
        @endif

        @if($statusmsg!="")
        <div class="alert alert-success">
            <strong>{{$statusmsg}}</strong>
        </div>
        @endif
        
        <section class="titulo">

            <div class="container">
                <div class="row">
                    <h5 class="title text-extra-dark-gray text-center">@lang('creditos.gestionCreditos')</h5>
                    <p class="text-extra-dark-gray text-center">@lang('creditos.cadaCredito')</p> 
                </div>
            </div>
        </section>

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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 0%<br>
                                            <b>USD 3,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=1')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 15%<br>
                                            <b>USD 25,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=2')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 25%<br>
                                            <b>USD 112,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=3')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 35%<br>
                                            <b>USD 195,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=4')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 45%<br>
                                            <b>USD 412,50</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=5')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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
                                        <div class="text-extra-small text-black margin-20px-top">@lang('creditos.ahorra') 60%<br>
                                            <b>USD 600,00</b></div>
                                    </div>
                                    <!-- end pricing price -->
                                </div>
                                <!-- start pricing features -->
                                <div class="pricing-features sm-padding-20px-all xs-padding-30px-all">
                                    <!-- start pricing action -->
                                    <div class="pricing-action sm-no-margin-top">
                                        <a href="{{url('checkout?plan=6')}}" class="btn"><i class="fa fa-shopping-cart"></i> @lang('creditos.comprar')</a>                                        
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

          <section class="usuario">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/mi-cuenta/user.png" alt="">
                        <p>{{ $user->name }}</p>
                        <p>@lang('creditos.creditosDisponibles') {{$tot}}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text">
            <div class="container">
                <div class="row">
                    <p class="text-center">@lang('creditos.losCreditosDuran')</p>
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
                                <p><b> @lang('creditos.tipoPlan')</b></p>
                                <p>@if($tot>0)
                                     Premium
                                    @else
                                     @lang('creditos.gratis')
                                    @endif</p>
                            </div>
                        </div>
                        <a href="#"><i class="fa fa-caret-right"></i> @lang('creditos.ampliar')</a>
                    </div>
                </div>
            </div>
        </section>
</div>

@endsection