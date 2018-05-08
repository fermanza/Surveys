@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.headerlog')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Editar encuesta</h1>
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
                                <li><a href="crear-encuesta.php" class="text-dark-gray">Editar encuesta</a></li>
                                <li class="text-dark-gray">{{ $template->name }}</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        {{-- <div class="titulo">{{ $template->name }}</div>  --}}

        <!-- start form section -->
        <section class="wow fadeIn titulo" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col">
                        <h5 class="font-weight-700 text-extra-dark-gray">{{ $template->name }}</h5>
                        <div class="btns">
                            <a href="#"><i class="fa fa-eye"></i> Vista previa</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- end form section -->
        <section class="encuesta">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- start accordions style 04 section -->

                        <!-- start accordion -->
                        <div class="panel-group accordion-style22" id="accordion-main">
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading active-accordion">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapse1">
                                        <div class="panel-title">
                                            <span>Tipo de pregunta <span class="q" data-toggle="tooltip" data-placement="right" title="Ayuda"><i class="fa fa-question-circle"></i></span></i></span>
                                            <i class="fa fa-angle-up pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul class="fa-ul">
                                            <li><div class="item-enc"><i class="fa fa-list-ul"></i> Multiple Choice</div> <a href="#" data-type="multi" class="agregar">Agregar</a></li>

                                            <li><div class="item-enc"><i class="fa fa-check-square-o"></i> Star Rating</div> <a href="#" data-type="star" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-align-justify"></i> Single TextBox</div> <a href="#" data-type="single" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-commenting"></i> Comment Box</div> <a href="#" data-type="comment" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-caret-square-o-down"></i> Dropdown</div> <a href="#" data-type="dropdown" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-server"></i> Matrix</div> <a href="#" data-type="matrix" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-bar-chart"></i> Ranking</div> <a href="#" data-type="rank" class="agregar">Agregar</a></li>
                                            <!--<li><div class="item-enc"><i class="fa fa-table"></i> Matrix Rating Scale</div> <a href="#" data-type="multi" class="agregar">Agregar</a></li>-->
                                            <li><div class="item-enc"><i class="fa fa-sliders"></i> Slider</div> <a href="#" data-type="slider" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-indent"></i> Multiple Textbooks</div> <a href="#" data-type="textbooks" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-comments"></i> Contact information</div> <a href="#" data-type="cntform" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-file-image-o"></i> Imagen</div> <a href="#" data-type="imagen" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-align-justify"></i> Texto</div> <a href="#" data-type="texto" class="agregar">Agregar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->

                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapse2">
                                        <div class="panel-title">
                                            <span>Templates <span class="q" data-toggle="tooltip" data-placement="right" title="Ayuda"><i class="fa fa-question-circle"></i></span></span>
                                            <i class="fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="fa-ul">
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Multiple Choice</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Star Rating</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Single TextBox</div> <a href="#" class="agregar">Agregar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->

                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-main" href="#collapse3">
                                        <div class="panel-title">
                                            <span>Lógica <span class="q" data-toggle="tooltip" data-placement="right" title="Ayuda"><i class="fa fa-question-circle"></i></span></span>
                                            <i class="fa fa-angle-down pull-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="fa-ul">
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Multiple Choice</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Star Rating</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-check"></i> Single TextBox</div> <a href="#" class="agregar">Agregar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end accordion -->

        <!-- end accordions style 04 section -->
                    </div>

                    <div class="col-md-9">
                        <div class="settings" id="survey_content" name="survey_content">
                            <div class="logo">
                                {{-- <img src="{{ asset('images/logo-survenia-color.png') }}" widht="30" height="30" alt=""> --}}
                             {{--    <a href="#">
                                    <i class="fa fa-plus-square-o"></i> LOGO
                                </a>
                                <br>
                                <br> --}}
                                <input type="hidden" name="_token" value="{{ Session::token() }}" />
                                <div class="col-md-12" align="center">
                                    <pre>+ LOGO {{ (!empty($result) ? print_r($result, 1) : '') }}</pre>
                                </div>
                                <div>
                                    <input type="file" name="file">
                                </div>
                            </div>
                            <br />
                            <div class="titulo">{{ $template->name }}</div>
                            <br />
                            <form action="{!! route('mis_encuestas.update', $template) !!}" method="PATCH" id="templateform">
                            {{ csrf_field() }}
                            <input type="hidden" name="template_name" class="form-control" value="{{ $template->name }}">
                            <input type="hidden" name="template_id" class="form-control" value="{{ $template->id }}">
                                <input type="hidden" name="questions_count" id="questions_count" value="0" />
                                <div id="template-container" name="template-container">
                                    {{-- All Survey Content --}}
                                    @foreach($questions as $data)
                                    
                                        <h6>{{ $data->content->question0}}</h6><br>
                                        
                                        <h6>{{ $data->content->option0}}</h6><br>

                             {{--            <h6>{{ $data->content->question1}}</h6><br>
                                        
                                        <h6>{{ $data->content->option1}}</h6><br> --}}


                                    @endforeach
                                </div>

                                <div class="guardar">
                                    <a href="{{ url()->previous() }}">Cancelar</a>
                                    <button class="btn" type="submit">Guardar</button>
                                </div>
                            </form>

                            {{-- <a href="#" class="sig"><i class="fa fa-plus-square-o"></i> Siguiente pregunta</a> --}}


                            <div style="clear:both"></div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
@stop