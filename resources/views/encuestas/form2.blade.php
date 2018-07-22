@extends('layouts.master')
@section('title', 'Crear Encuesta')

@include('includes.header')

@section('content')
        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Creación de encuesta</h1>
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
                                <li><a href="crear-encuesta.php" class="text-dark-gray">Creación de encuesta</a></li>
                                <li class="text-dark-gray">Nombre de la encuesta</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <!-- start form section -->
        <section class="wow fadeIn titulo" id="start-your-project">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 center-col">
                        <h5 class="font-weight-700 text-extra-dark-gray">Nombre de la encuesta</h5>
                        <div class="btns">
                            <a href="#"><i class="fa fa-eye"></i> Vista previa</a>
                            <a href="#">Guardar</a>
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
                                            <li><div class="item-enc"><i class="fa fa-list-ul"></i> Multiple Choice</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-check-square-o"></i> Star Rating</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-align-justify"></i> Single TextBox</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-commenting"></i> Comment Box</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-caret-square-o-down"></i> Dropdown</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-server"></i> Matrix</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-bar-chart"></i> Ranking</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-table"></i> Matrix Rating Scale</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-sliders"></i> Slider</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-indent"></i> Multiple Textbooks</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-comments"></i> Contact information</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-file-image-o"></i> Imagen</div> <a href="#" class="agregar">Agregar</a></li>
                                            <li><div class="item-enc"><i class="fa fa-align-justify"></i> Texto</div> <a href="#" class="agregar">Agregar</a></li>

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
                        <div class="settings">
                            <div class="logo">
                                <img src="images/logo-survenia-color.png" alt="">
                                <a href="#">
                                    <i class="fa fa-plus-square-o"></i> LOGO
                                </a>
                            </div>

                            <div class="titulo">Nombre de la encuesta</div>


                            <form>
                                <a href="#" class="btn-agregar"><i class="fa fa-caret-right"></i> Agregar una pregunta</a>
                                <div class="select-style big-select">
                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                         <option value="">Multiple Choice</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="ing">
                                    <input type="text" placeholder="Ingrese la pregunta">
                                    <span class="q" data-toggle="tooltip" data-placement="left" title="Ayuda"><i class="fa fa-question-circle"></i></span>
                                </div>
                                <h6>Opciones de respuesta</h6>
                                <div class="radio">
                                    <div class="text-edit">
                                        <a href="#"><i class="fa fa-bold"></i></a>
                                        <a href="#"><i class="fa fa-underline"></i></a>
                                        <a href="#"><i class="fa fa-italic"></i></a>
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a href="#"><i class="fa fa-font"></i></a>
                                        <a href="#"><i class="fa fa-caret-down"></i></a>
                                    </div>
                                    <input type="radio" id="radio1">
                                    <label for="radio1"><input type="text" placeholder="Ingrese una opción de respuesta"></label>
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                    <a href="#"><i class="fa fa-minus"></i></a>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="radio2">
                                    <label for="radio2"><input type="text" placeholder="Ingrese una opción de respuesta"></label>
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                    <a href="#"><i class="fa fa-minus"></i></a>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="radio3">
                                    <label for="radio3"><input type="text" placeholder="Ingrese una opción de respuesta"></label>
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                    <a href="#"><i class="fa fa-minus"></i></a>
                                </div>
                                <div class="sep"></div>
                                <div class="check">
                                    <input type="checkbox" id="check1">
                                    <label for="check1">Calificar esta pregunta (habilitar el modo de test) ?</label>
                                    <span class="q" data-toggle="tooltip" data-placement="left" title="Ayuda"><i class="fa fa-question-circle"></i></span>
                                </div>
                                <div class="sep"></div>
                                <div class="check">
                                    <input type="checkbox" id="check2">
                                    <label for="check2">Agregar una opción de respuesta "Otra" o un campo para Comentarios</label>
                                    <span class="q" data-toggle="tooltip" data-placement="left" title="Ayuda"><i class="fa fa-question-circle"></i></span>
                                </div>

                            </form>

                            <a href="#" class="sig"><i class="fa fa-plus-square-o"></i> Siguiente pregunta</a>

                            <div class="guardar">
                                <a href="#">Cancelar</a>
                                <a href="#">Guardar</a>
                            </div>

                            <div style="clear:both"></div>

                            <a href="#" class="fin">Finalizar encuesta</a>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    <div class="row">
        <div class="col-lg-12">
            <div id="app">
                <app-survey-builder></app-survey-builder>
            </div>
        </div>
    </div>
@endsection
