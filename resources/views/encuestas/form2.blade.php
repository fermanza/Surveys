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
                                <li class="text-dark-gray">{{$template->name}}</li>
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
                        <h5 class="font-weight-700 text-extra-dark-gray">{{$template->name}}</h5>
                        {{-- <div class="btns">
                            <a href="#"><i class="fa fa-eye"></i> Vista previa</a>
                            <a href="#">Guardar</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- end form section -->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" align="center">
        <label>Logo</label>
        <input type="file" name="surveyLogo" id="surveyLogo">
        </div>
    </div>
    <div id="app">

    {{--<input style="display:none;" type="text" name="template" value={{$template->id}}>--}}

    <app-survey-builder :template={{$template->id}}></app-survey-builder>
        {{-- <app-survey-builder :initial-elements="{{ '[{"uid":"eabacf97b10b5c534820660016bbc84a","type":"text","title":"Texto","className":"fa-font","config":{"title":"Texto"},"answer":""},{"uid":"d85eae20d93d97eb895c1a46e6914366","type":"textarea","title":"Comentarios","className":"fa-comments","config":{"title":"Comentarios"},"answer":""},{"uid":"f074f4602a4783c487d7304299610bec","type":"header","title":"Parrafo","className":"fa-heading","config":{"title":"Parrafo"},"answer":""}]' }}"></app-survey-builder> --}}
        {{-- <app-survey-builder :initial-elements="{{ $questionsJson }}"></app-survey-builder> --}}
    </div>
@endsection
