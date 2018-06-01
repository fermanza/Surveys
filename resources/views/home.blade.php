@extends('layouts.master')
@section('title', 'Home')

@extends('includes.header')
@section('content')

        <!-- start slider section --> 
        <section class="wow fadeIn example no-padding no-transition">
            <article class="content">
                <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                    <!-- start revolution slider 5.4.1 fullwidth mode -->
                    <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                        <ul><!-- slide  -->
                            <li data-index="rs-3045" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="200"  data-thumb="http://placehold.it/100x50"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="100" data-fsslotamount="0" data-saveperformance="off"  data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <div class="opacity-extra-medium position-relative z-index-1"></div>
                                <!-- main image -->
                                <img src="images/home/banner.jpg"  alt="Ocean"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" class="rev-slidebg">
                                
                                <!-- layer nr. 4 -->
                                <div class="tp-caption NotGeneric-SubTitle tp-resizeme " 
                                     data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']" 
                                     data-y="['top','top','middle','middle']" data-voffset="['110','80','250','200']" 
                                     data-fontsize="['76','76','55','45']"
                                     data-lineheight="['78','78','68','45']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text" 
                                     data-responsive_offset="on" 
                                     data-frames='[{"from":"y:50px;opacity:0;","speed":1000,"to":"o:1;","delay":300,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[10,10,10,10]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[10,10,10,10]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 8; white-space: nowrap; font-family:'Roboto', sans-serif !important; font-weight: 600; letter-spacing: -1px; color: #000;">@lang('home.creaTuEncuesta')<br>online</div>
                                
                                <!-- layer nr. 3 -->
                                <div class="tp-caption NotGeneric-Title tp-resizeme" 
                                     data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']" 
                                     data-y="['top','top','middle','middle']" data-voffset="['280','250','340','280']"
                                     data-fontsize="['16','16','16','16']"
                                     data-lineheight="['26','26','26','26']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text" 
                                     data-responsive_offset="on" 
                                     data-frames='[{"from":"y:50px;opacity:0;","speed":1000,"to":"o:1;","delay":600,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[10,10,10,10]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[10,10,10,10]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 7; white-space: nowrap; font-family:'Roboto', sans-serif !important; font-weight: 400; color:#000;">
                                     @lang('home.creaDistribuye')
                                     <br>@lang('home.rapidamente')</div>
                                <!-- layer nr. 5 -->
                                
                                <a href="{{ URL('encuestas') }}" class="tp-caption btn btn-medium z-index-5 btn1" 
                                   data-x="['left','left','left','left']" data-hoffset="['15','15','15','15']" 
                                   data-y="['middle','middle','middle','middle']" data-voffset="['90','60','390','330']" 
                                   data-fontsize="['15','15','15','15']"
                                   data-whitespace="nowrap"
                                   data-visibility="['on', 'on', 'on', 'on']"
                                   data-type="text"
                                   data-color="['#FFFFFF']"
                                   data-responsive_offset="on" 
                                   data-responsive="on"
                                   data-frames='[{"from":"y:150px;opacity:0;","speed":1500,"to":"o:1;","delay":900,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bc:rgba(255, 255, 255, 1.00);bw:2px 2px 2px 2px;"}]'
                                   data-textAlign="['center', 'center', 'center', 'center']" 
                                   data-paddingtop="[2,2,2,2]"
                                   data-paddingright="[26,26,26,26]"
                                   data-paddingbottom="[2,2,2,2]"
                                   data-paddingleft="[26,26,26,26]" style="border-radius: 50px; background-color: #5ba01f;font-family:'Roboto', sans-serif !important;"> @lang('home.creaEncuesta') </a>
                               
                                   <!-- layer nr. 5 -->
                                <a href="{{ URL('encuestas_publicas') }}" class="tp-caption btn btn-transparent-black btn-medium z-index-5 btn2" 
                                   data-x="['left','left','left','left']" data-hoffset="['210%','210%','210%','210%']" 
                                   data-y="['middle','middle','middle','middle']" data-voffset="['90','60','390','330']" 
                                   data-fontsize="['15','15','15','15']"
                                   data-whitespace="nowrap"
                                   data-visibility="['on', 'on', 'on', 'on']"
                                   data-type="text"
                                   data-color="['#000']"
                                   data-responsive_offset="on" 
                                   data-responsive="on"
                                   data-frames='[{"from":"y:150px;opacity:0;","speed":1500,"to":"o:1;","delay":1200,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                   data-textAlign="['center', 'center', 'center', 'center']" 
                                   data-paddingtop="[3,3,3,3]"
                                   data-paddingright="[26,26,26,26]"
                                   data-paddingbottom="[2,2,2,2]"
                                   data-paddingleft="[26,26,26,26]" style="border-radius: 50px;color: #000 !important;font-family:'Roboto', sans-serif !important;"> @lang('home.verReportes') </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end revolution slider -->
            </article>
        </section>
        <!-- end slider section -->

        <!-- start section -->
        <section class="no-padding wow fadeIn animated">
            <div class="container-fluid">
                <div class="row equalize sm-equalize-auto">
                    <!-- start features item -->
                    <div class="col-md-3 no-padding cover-background position-relative sm-height-500px xs-height-300px wow fadeIn" style="background: url('images/home/p1.jpg');background-size: cover;"></div>
                    <!-- end features item -->
                    <!-- start features item -->
                    <div class="eq-info col-md-3 no-padding position-relative wow fadeIn sm-text-center" data-wow-delay="0.2s">
                        <div class="display-table width-100 height-100">
                            <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all xs-padding-30px-all">
                                <div class="text-light-gray margin-10px-bottom"> @lang('home.comoFunciona')  </div>
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom">
                                 @lang('home.creaEnvia')   
                                </div>
                                <p>
                                 @lang('home.empleaMultiplesTiposDePreguntas')
                                </p><br>
                                <a href="{{ URL('como_funciona') }}" class="btn btn-transparent-white btn-small border-radius-4"> @lang('home.verInstructivo')   </a>
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
                                <div class="text-light-gray margin-10px-bottom">@lang('home.plantillas')   </div>
                                <div class="eq-title margin-20px-bottom text-white md-width-100 xs-margin-15px-bottom">
                                @lang('home.modelosDeCuestionarios') </div>
                                <p>  
                                @lang('home.conNuestrasPlantillas')    
                                </p><br>
                                <a href="{{ URL('plantillas') }}" class="btn btn-transparent-white btn-small border-radius-4"> @lang('home.verPlantillas')</a>
                            </div>
                        </div>
                    </div>
                    <!-- end features item -->
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start services section -->
        <section class="wow fadeIn animated servicios">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 center-col text-center last-paragraph-no-margin">
                        <p class="width-80 center-col display-inline-block xs-width-100"> @lang('home.encuestasOnline')</p>
                        <h5 class="text-extra-dark-gray font-weight-600"> @lang('home.caracteristicasDelServicio') </h5>
                        
                    </div>
                </div>
                <div class="row equalize">
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s1.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600">@lang('home.facilDeUsar') </div>
                            <p class="width-75 center-col text-dark-gray"> @lang('home.nuestrasHerramientas')  </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s2.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600"> @lang('home.resultadosInstantaneos')  </div>
                            <p class="width-75 center-col text-dark-gray">@lang('home.sigueTusResultados') </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s3.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600"> @lang('home.encuestasMoviles')  </div>
                            <p class="width-75 center-col text-dark-gray">@lang('home.conLaInterfaceOptimizada')    </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.6s">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s4.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600">@lang('home.economico')</div>
                            <p class="width-75 center-col text-dark-gray">@lang('home.surveniaNoTeObliga')  </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.8s">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s5.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600"> @lang('home.plantillas')</div>
                            <p class="width-75 center-col text-dark-gray">@lang('home.utilizaLasPlantillas') </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start features box item -->
                    <div class="servicio col-md-4 col-sm-6 col-xs-12 wow fadeInUp last-paragraph-no-margin" data-wow-delay="1s">
                        <div class="bg-white border-color-extra-medium-gray border-solid border-width-1 text-center border-radius-4 position-relative inner-match-height">
                            <div class="display-inline-block icon-round-small">
                                <img src="images/home/s6.png" alt="">
                            </div>
                            <div class="text text-extra-dark-gray font-weight-600">Survenia Blog</div>
                            <p class="width-75 center-col text-dark-gray">@lang('home.publicaTusEncuestas') .</p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
            </div>
        </section>
        <!-- end services section -->

        <!-- start about section --> 
        <section class="planes no-padding wow fadeIn cover-background sm-no-background-img bg-medium-light-gray" style="background-image: url('images/home/p3.jpg');">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right wow fadeIn">
                        <div class="col-lg-12 col-md-12 sm-text-center xs-no-padding-lr last-paragraph-no-margin sm-margin-30px-bottom">
                            <h5 class="text-white font-weight-600">@lang('home.planes') </h5>
                        </div> 
                        <div class="cont">                         
                        <!-- star feature box item -->
                        <div class="col-md-6 col-sm-6 xs-margin-30px-bottom last-paragraph-no-margin xs-no-padding-lr sm-text-center flex-plan">
                            <div class="feature-content">
                                <div class="subtitle font-weight-600 text-white margin-5px-bottom">@lang('home.gratuito') </div>
                                <ul class="fa-ul">
                                    <li><i class="fa fa-check"></i> <div>10 @lang('home.preguntas') </div></li>
                                    <li><i class="fa fa-check"></i> <div>100 @lang('home.respuestas') </div></li>
                                    <li><i class="fa fa-check"></i> <div>@lang('home.funcionalidades') </div></li><br>
                                </ul>
                                <a href="registro" class="btn">@lang('home.registrarse')</a>
                            </div> 
                        </div>
                        <!-- end feature box item -->
                        <!-- star feature box item -->
                        <div class="col-md-6 col-sm-6 last-paragraph-no-margin xs-no-padding-lr sm-text-center">
                            <div class="feature-content">
                                <div class="subtitle font-weight-600 text-white margin-5px-bottom">Premium</div>
                                <ul class="fa-ul">
                                    <li><i class="fa fa-check"></i> <div> @lang('home.preguntas') @lang('home.ilimitadas')  </div></li>
                                    <li><i class="fa fa-check"></i> <div> @lang('home.respuestas') @lang('home.ilimitadas')</div></li>
                                    <li><i class="fa fa-check"></i> <div>@lang('home.funcionalidades')</div></li>
                                    <li><i class="fa fa-check"></i> <div>@lang('home.paqueteEncuestas') </div></li>
                                </ul>
                                <a href="#" class="btn btn2">@lang('home.contratar')</a>
                            </div> 
                        </div>
                        <!-- end feature box item -->
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <!-- end about section -->
        <!-- start form section -->
        <section class="wow fadeIn contacto" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">@lang('home.envianosTusConsultas')  </h5>
                        <p>@lang('home.nuestroEquipoDeSoporte')  <br>@lang('home.puedeEncontrar')  <a href="mailto:info@survenia.com">info@survenia.com</a></p>
                    </div>  
                </div>
                <form id="project-contact-form" action="javascript:void(0)" method="post">
                    <div class="row">
                         <div class="col-md-12">
                            <div id="success-project-contact-form" class="no-margin-lr"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" placeholder="@lang('home.nombre') *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" placeholder="@lang('home.telefono') *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" id="email" placeholder="E-mail *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <div class="select-style big-select">
                                <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                     <option value="">Plan</option>
                                    <option value="gratuito">Gratuito</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea name="comment" id="comment" placeholder="@lang('home.comentarios')" rows="6" class="big-textarea"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="project-contact-us-button" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">@lang('home.enviar') </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@stop