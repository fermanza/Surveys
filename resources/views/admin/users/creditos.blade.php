@extends('admin.default')

@section('page-header')
  Agregar créditos a <big>{{ trans('Usuario') }}</big>
@stop

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
<section class="wow fadeIn planes">
            <div class="container">                
                <div class="row">
                    <div class="pricing-box-style1">
                        <!-- start pricing item -->
                        <div class="col-md-6 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
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
                                        <a href="{{url('checkout?plan=1')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
                                    </div>
                                    <!-- end pricing action -->
                                </div>
                                <!-- end pricing features -->
                            </div>
                        </div>
                        <!-- end pricing item -->
                        <!-- start pricing item -->
                        <div class="col-md-6 col-sm-4 col-xs-6 text-center wow fadeInUp" data-wow-delay="0.4s">
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
                                        <a href="{{url('checkout?plan=2')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
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
                                        <a href="{{url('checkout?plan=3')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
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
                                        <a href="{{url('checkout?plan=4')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
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
                                        <a href="{{url('checkout?plan=5')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
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
                                        <a href="{{url('checkout?plan=6')}}" class="btn"><i class="fa fa-shopping-cart"></i> Comprar</a>                                        
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


@stop

