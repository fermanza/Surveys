<!DOCTYPE html>
<html>
    <head>
        <title>Survenia - @yield('title')</title>
        <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="">
        <!-- description -->
        <meta name="description" content=".">
        <!-- keywords -->
        <meta name="keywords" content="">
        <!-- favicon -->
{{--         <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}"/>
        <link rel="manifest" href="{{ asset('icons/manifest.json') }}">
        <link rel="mask-icon" href="{{ asset('icons/safari-pinned-tab.svg') }}" color="#112b3e">
        <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}">
        <meta name="msapplication-config" content="{{ asset('icons/browserconfig.xml') }}">
        <meta name="theme-color" content="#ffffff">
 --}}
        <!-- Fav Icon --> 
        <link rel="icon" href="icons/favicon.ico" sizes="64x64" >
        <!-- animation -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}"/>
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
        <!-- et line icon --> 
        <link rel="stylesheet" href="{{ asset('css/et-line-icons.css') }}" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
        <!-- themify icon -->
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}"/>
        <!-- swiper carousel -->
        <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}"/>
        <!-- justified gallery  -->
        <link rel="stylesheet" href="{{ asset('css/justified-gallery.min.css') }}"/>
        <!-- magnific popup -->
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css') }}"/>
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}"/>
        <!-- style -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

        {{-- trumbowyg --}}
        

        <link rel="stylesheet" href="{{ asset('dist/ui/trumbowyg.css') }}">

        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <link rel="stylesheed" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.2/css/tabulator.min.css" rel="stylesheet">
    </head>
    <body class="index">
        @yield('content')        

        <!-- start footer --> 
        <footer class="footer-clean-dark xs-padding-30px-tb"> 
            <div class="footer-widget-area padding-50px-bottom">
                <div class="container">
                    <div class="row">
                        <!-- start logo -->
                        <div class="col-md-5 col-xs-12 widget border-right sm-no-border-right sm-margin-30px-bottom xs-text-center">
                            <!-- start logo -->
                            <a href="/" class="margin-20px-bottom display-inline-block"><img class="footer-logo" src="{{ asset('images/logo-survenia.png') }}" alt="Survenia"></a>
                            <!-- end logo -->
                            <p class="text-light-gray"><b>@lang('footer.porqueElegirnos')</b><br> @lang('footer.seguridadYrespaldo')</p>
                            <!-- start social media -->
                            <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                                <ul class="small-icon no-margin-bottom">
                                    <li><a class="text-white" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a class="text-white" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="text-white" href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <!-- end social media -->
                        </div>
                        <!-- end logo -->
                        <!-- start social media -->
                        <div class="links widget border-right xs-margin-30px-bottom">
                            <div class="widget-title alt-font text-extra-small text-light-gray text-uppercase font-weight-600">Links</div>
                            <ul class="list-unstyled">
                                <li class="width-50 pull-left"><a href="/" class="text-light-gray">@lang('footer.inicio')</a></li>
                                <li class="width-50 pull-left"><a href="como_funciona" class="text-light-gray">@lang('footer.comoFunciona')</a></li>
                                <li class="width-50 pull-left"><a href="plantillas" class="text-light-gray">@lang('footer.plantillas')</a></li>
                                <li class="width-50 pull-left"><a href="planes" class="text-light-gray">@lang('footer.planesPrecios')</a></li>
                                <li class="width-50 pull-left"><a href="encuestas" class="text-light-gray">@lang('footer.creacionEncuesta')</a></li>
                                <li class="width-50 pull-left"><a href="encuestas_publicas" class="text-light-gray">@lang('footer.encuestasPublicas')</a></li>
                                <li class="width-50 pull-left"><a href="articulos" class="text-light-gray">@lang('footer.articulos')</a></li>
                                <li class="width-50 pull-left"><a href="contacto" class="text-light-gray">@lang('footer.contacto')</a></li>
                            </ul>
                        </div>
                        <!-- end social media -->
                        <!-- start contact information -->
                        <div class="contactor widget border-right xs-margin-30px-bottom">
                            <div class="widget-title alt-font text-extra-small text-uppercase text-light-gray font-weight-600">@lang('footer.contacto')</div>
                            <div class="line-height-24 text-light-gray">Email: <a href="mailto:info@survenia.com" class="text-light-gray">info@survenia.com</a></div>
                            <div class="line-height-24 text-light-gray"><a href="http://www.survenia.com" class="text-light-gray">www.survenia.com</a></div>
                        </div>
                        <!-- end contact information -->
                        <!-- start newsletter -->
                        <div class="col-md-5 col-xs-12 widget">
                            <div class="widget-title alt-font text-extra-small text-light-gray text-uppercase font-weight-600">@lang('footer.ultimosArticulos')</div>
               
                            @foreach($articulos as $articulo)
                            <div class="col-md-12 footer-post">
                                <a href="{{url('articulos')}}/{{$articulo->id}}">
                                    <p class="text-light-gray" style="font-size:1em;margin-left:5px;"><img src="{{URL($articulo->img)}}" width="20%" alt="">{{$articulo->title}} </p>
                                </a>
                            </div>
                            @endforeach
                            
                        </div>
                        <!-- end newsletter -->
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row"> 
                        <!-- start copyright -->
                        <div class="col-md-6 col-xs-12 text-left">&COPY; 2018 - All rights Reserved Survenia</div>
                        <div class="col-md-6 col-xs-12 text-right"><a href="http://rednodo.com"></a></div>
                      @if(Auth::check() && Auth::user()->id == 1)
                        <a href="{{ URL('login') }}">Admin</a>
                      @endif    
                        <!-- end copyright -->
                      
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/skrollr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/smooth-scroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="{{ asset('js/bootsnav.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script>
        <!-- animation -->
        <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="{{ asset('js/page-scroll.js') }}"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
        <!-- counter -->
        <script type="text/javascript" src="{{ asset('js/jquery.count-to.js') }}"></script>
        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('js/jquery.stellar.js') }}"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/hamburger-menu.js') }}"></script>
        <!-- counter  -->
        <script type="text/javascript" src="{{ asset('js/counter.js') }}"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
        <!-- equalize -->
        <script type="text/javascript" src="{{ asset('js/equalize.min.js') }}"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="{{ asset('js/skill.bars.jquery.js') }}"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="{{ asset('js/justified-gallery.min.js') }}"></script>
        <!--pie chart-->
        <script type="text/javascript" src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
        <!-- instagram -->
        <script type="text/javascript" src="{{ asset('js/instafeed.min.js') }}"></script>
        <!-- retina -->
        <script type="text/javascript" src="{{ asset('js/retina.min.js') }}"></script>
        <!-- revolution -->
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
        <!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
        <!-- setting -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
        <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.js"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.5.2/js/tabulator.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/articulosScript.js') }}"></script>



        <script src="{{ asset('dist/trumbowyg.js') }}"></script>
        <script src="{{ asset('dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/pasteimage/trumbowyg.pasteimage.min.js') }}"></script>
      
        
        
        <!-- Datatables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.20.6/dist/sweetalert2.all.js"></script>
        
        @stack('script')
    </body>
</html>