<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav navbar-fixed-top header-light white-link">
        <div class="container nav-header-container">
            <div class="row">
                <!-- start logo -->
                <div class="col-md-2 col-xs-5">
                    <a href="/" class="logo"><img src="images/logo-survenia.png" class="logo-dark" alt="Survenia"><img src="images/logo-survenia.png" alt="Survenia" class="logo-light default"></a>
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

                                <li><a href="{{ URL('encuestas_publicas') }}">Encuestas Públicas</a></li>
                                <li><a href="{{ URL('articulos') }}">Artículos</a></li>
                                <li><a href="{{ URL('plantillas') }}">Plantillas</a></li>
                                <li><a href="{{ URL('planes') }}">Planes y Precios</a></li>
                                @auth
                                    <li><a href="{{ URL('mis_encuestas') }}">Ingresar</a></li>
                                @else
                                    <li><a href="{{ URL('inicio_sesion') }}">Ingresar</a></li>
                                @endauth
                                <li><a href="{{ URL('contacto') }}">Contacto</a></li>


                            <li class="lang"><a href="#">ES</a> | <a href="#">EN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- end header -->

