@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.header')
@section('content')

<style>
.clear-all,.get-data,.save-template
{
visibility:hidden;
}
</style>

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
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- end form section -->
        <section class="encuesta">
            <div class="container">
                <div class="row">
        
                       <div class="settings" id="survey_content" name="survey_content">
                        <div class="titulo">{{ $template->name }}</div>
                         <form id="fb-editor"></form>
                         <div class="guardar">
                                    <a href="{{ url()->previous() }}">Cancelar</a>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">Contestar</button>
                        </div>
                        </div>

                </div>
            </div>
        </section>

@stop

@push('script')
  <script>
  $(document).ready(function() {
      
        var options = {
      i18n: {
        locale: 'es-ES'
      },
      controlPosition: 'left'
    };

var fbRender = document.getElementById('fb-editor');
var formData = JSON.parse('<?php echo json_encode($question->content) ?>');
var options = {
      defaultFields: formData,
      controlPosition: 'left'
    };

    //var formBuilder = $(fbRender).formBuilder(options);


  var formRenderOpts = {
      fbRender,
    formData,
    dataType: 'json'
  };

  console.log(formData);

 $(fbRender).formRender(formRenderOpts);


    document.getElementById('save-data').addEventListener('click', function() {
    var jsondata=fbRender.actions.getData('json');
    var templateid=document.getElementById('template_id');
    var token=document.getElementById('csrf-token');

    var data={
        content:jsondata,
        template_id:templateid.value,
        _token:token.value
    };
    console.log(data);
    // Fire off the request to /form.php
    request = $.ajax({
        url: '{{url('saveQuestion')}}',
        type: "post",
        data: data
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

  });



});
  </script>


@endpush