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
                            <h1 class="no-margin-bottom">@lang('mis_encuestas.creacionEncuesta')</h1>
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
                                <li><a href="crear-encuesta.php" class="text-dark-gray">@lang('mis_encuestas.creacionEncuesta')</a></li>
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
                            {{-- <a href="#"><i class="fa fa-eye"></i> Vista previa</a> --}}
                        </div>
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
                    <div class="col-md-4">
                        <div class="panel panel-default">
                                <div class="panel-heading active">
                                    <div class="panel-title">
                                            <span class="btn btn-success">@lang('mis_encuestas.tipoPregunta') <span class="q" data-placement="center" title="Ayuda"><i class="fa fa-question-circle"></i></span></i></span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <br><br>
                        <form id="fb-editor"></form>
                         <div class="guardar">
                                    <a href="{{ url()->previous() }}">@lang('mis_encuestas.cancelar')</a>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">@lang('mis_encuestas.guardar')</button>
                        </div>
                </div>

            </div>
        </div>
        </section>

@stop

@push('script')
  <script>
  $(document).ready(function() {
      


let fields = [{
  label: 'Star Rating',
  attrs: {
    type: 'starRating'
  },
  icon: '🌟'
},
{
      label: "Email",
      type: "text",
      subtype: "email",
      icon: "✉️"
},
{
      label: "Imagen",
      type: "file",
      subtype: "file",
      icon: "✉️"
},
{
  label: 'Slider',
  attrs: {
    type: 'slider'
  },
  icon: '↔️'
}

];
let templates = {
  starRating: function(fieldData) {
    return {
      field: '<span id="'+fieldData.name+'">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
      }
    };
  },
  imagen: function(fieldData) {
    return {
      field: '<label>Subir Imagen</label><input type="file" id="'+fieldData.name+'" name="img">',
      onRender: function() {
        $(document.getElementById(fieldData.name));
      }
    };
  },
  slider: function(fieldData) {
    return {
      field: '<h6 align="left">0</h6><input id='+fieldData.name+' type="range" min="0" max="100" step="10" data-orientation="vertical">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rangeslider();
      }
    };
  }

};


  var options = {
    fields, templates,
      i18n: {
        locale: 'es-ES'
      },
      controlPosition: 'left',
      prepend: '<h5 class="text-center">{{ $template->name }}</h5>',
       controlOrder: [
        'title',
        'text',
        'textarea'
       ],
      disabledAttrs: ['placeholder', 'description','access','maxlength','subtype','required','inline','toggle'],
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number','paragraph','header'] 
    };


    var fbEditor = document.getElementById('fb-editor');
    var formBuilder = $(fbEditor).formBuilder(options);

    document.getElementById('save-data').addEventListener('click', function() {
    var jsondata=formBuilder.actions.getData('json');
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
        swal({
          position: 'center',
          title: 'Encuesta creada.',
          type: 'success'
      }).then(function() {
          window.location = "{{url('mis_encuestas')}}";
      });
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.log(jqXHR.responseText);
        if(jqXHR.responseText=='"exceso"')
        {
            swal({
                position: 'center',
                title: 'El número de preguntas <br> es mayor al límite permitido <br>en una encuesta gratuita.',
                type: 'error'
            })
        }
    });

  });



});
  </script>


@endpush