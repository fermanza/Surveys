<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav navbar-fixed-top header-light white-link">
        <div class="container nav-header-container">
            <div class="row">
                <!-- start logo -->
                <div class="col-md-2 col-xs-5">
                    <a href="/" class="logo"><img src="{{ asset('images/logo-survenia.png') }}" class="logo-dark" alt="Survenia"><img src="{{ asset('images/logo-survenia.png') }}" alt="Survenia" class="logo-light default"></a>
                </div>
                <!-- end logo -->
                <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                    <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                        <span class="sr-only">toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">

                        

                        <ul id="accordion" class="nav navbar-nav navbar-left no-margin main-font text-normal" data-in="fadeIn" data-out="fadeOut">

                     
                                @auth
                                <li><a href="{{ URL('encuestas') }}">@lang('app.crearEncuesta')</a></li>
                                <li><a href="{{ URL('mis_encuestas') }}"> @lang('app.misEncuestas')</a></li>
                                <li><a href="{{ URL('encuestas_publicas') }}">@lang('app.encuestasPublicas')  </a></li>
                                <li><a href="{{ URL('articulos') }}"> @lang('app.articulos') </a></li> 

                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">@lang('app.miCuenta') </a>
                                <ul class="dropdown-menu">
                                    <li><a href="mi_cuenta2">@lang('app.gestionDeCreditos') </a></li>
                                    <li><a href="/my_account">@lang('app.datosPersonales') </a></li>
                                    <li><a href="/logout"> @lang('app.cerrarSesion')  </a></li>
                                </ul>
                            </li>

    
                            <li><a href="{{ URL('contacto') }}"> @lang('app.contacto')   </a></li>
                                @else
                                <li><a href="{{ URL('encuestas_publicas') }}">Encuestas Públicas</a></li>
                                <li><a href="{{ URL('articulos') }}">Artículos</a></li>
                                <li><a href="{{ URL('plantillas') }}">Plantillas</a></li>
                                <li><a href="{{ URL('planes') }}">Planes y Precios</a></li>
                                    <li><a href="{{ URL('inicio_sesion') }}">Ingresar</a></li>
                                    <li><a href="{{ URL('contacto') }}">Contacto</a></li>
                                @endauth
                                


                              <li class="lang"><a href="{{url('setLanguage/es')}}">ES</a> | <a href="{{url('setLanguage/en')}}">EN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- end header -->

