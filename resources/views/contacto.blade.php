@extends('layouts.master')
@section('title', 'Contacto')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Contacto</h1>
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
                                <li><a href="/" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li class="text-dark-gray">Contacto</li>
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
                    <div class="col-lg-12 col-md-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray text-uppercase">Envianos tu consulta</h5>
                        <p>Nuestro equipo de soporte está listo para ayudar con cualquier problema que pueda tener.<br>Puede encontrar más información aquí <a href="mailto:info@survenia.com">info@survenia.com</a></p>
                    </div>  
                </div>
                <form id="project-contact-form" action="javascript:void(0)" method="post">
                    <div class="row">
                         <div class="col-md-12">
                            <div id="success-project-contact-form" class="no-margin-lr"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" placeholder="Nombre *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" placeholder="Teléfono *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" id="email" placeholder="E-mail *" class="big-input">
                        </div>
                        <div class="col-md-6">
                            <div class="select-style big-select">
                                <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                     <option value="">Plan</option>
                                    <option value="Gratuito">Gratuito</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea name="comment" id="comment" placeholder="Comentarios" rows="6" class="big-textarea"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="project-contact-us-button" type="submit" class="btn btn-transparent-dark-gray btn-large margin-20px-top">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@stop