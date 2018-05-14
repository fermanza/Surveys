@extends('layouts.master')
@section('title', 'Responder Encuesta')

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
                            <h1 class="no-margin-bottom">Responder encuesta</h1>
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
                                <li><a href="crear-encuesta.php" class="text-dark-gray">Responder encuesta</a></li>
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
                        <br>
                         <h5 class="text-center">{{ $template->name }}</h5>
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
    let fields = [{
  label: 'Star Rating',
  attrs: {
    type: 'starRating'
  },
  icon: '🌟'
},
{
  label: 'Slider',
  attrs: {
    type: 'slider'
  },
  icon: ''
},
{
  label: 'Matriz',
  attrs: {
    type: 'matriz'
  },
  icon: ''
}

];
let templates = {
    starRating: function(fieldData) {
    return {
      field: '<input type="hidden" id="star'+fieldData.name+'"><span id="'+fieldData.name+'">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rateYo({
 
 onSet: function (rating, rateYoInstance) {

   $(document.getElementById('star'+fieldData.name)).val(rating);
 }
});
      }
    };
  },
  slider: function(fieldData) {
    return {
      field: '<input type="hidden" name="slider'+fieldData.name+'" id="slider'+fieldData.name+'"><div id="'+fieldData.name+'"></div>',
      onRender: function() {
        $(document.getElementById(fieldData.name)).slider({
      range: "max",
      min: 0,
      max: 100,
      value: 1,
      slide: function( event, ui ) {
        $( "#slider"+fieldData.name ).val( ui.value );
      }
    });
    
    }
    }
  },
  matriz: function(fieldData) {
    return {
      field: '<div id='+fieldData.name+'></div>',
      onRender: function() {
        
      }
    };
  }

};

  var formRenderOpts = {
    fields, templates,
      fbRender,
    formData,
    dataType: 'json'
  };

  console.log(formData);

 $(fbRender).formRender(formRenderOpts);


    document.getElementById('save-data').addEventListener('click', function() {
        var $form = $("#fb-editor");
        var formdata = JSON.stringify($form.serializeArray());
        var id_template=$("#template_id").val();
        var token=$("#csrf-token").val();
    
    request = $.ajax({
        url: '{{url('saveAnswer')}}',
        type: "post",
        data: {
            answer:formdata,
            id_template:id_template,
            _token:token
        }
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        console.log(response);
        alert('Tus respuestas fueron guardadas correctamente.');
        $(location).attr('href', '/mis_encuestas')
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "Ha ocurrido un error: "+
            textStatus, errorThrown
        );
    });
    });

});
  </script>


@endpush