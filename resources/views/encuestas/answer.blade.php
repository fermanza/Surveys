@extends('layouts.master')
@section('title', 'Responder Encuesta')

@extends('includes.header')
@section('content')

<style>
.clear-all,.get-data,.save-template,.fb-file
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
                            <h1 class="no-margin-bottom">@lang('answer.responderEncuesta')</h1>
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
                                <li><a href="crear-encuesta.php" class="text-dark-gray">@lang('answer.responderEncuesta')</a></li>
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
        
        
        <!-- end form section -->
        <section class="encuesta">
            <div class="container">
                <div class="row">
        
                       <div class="settings" id="survey_content" name="survey_content">
                        <br>
                        <div class="row" align="center">
                          <img src="{{ URL($template->url) }}" style="width: 125px; height:100px;"><br><br>
                          </div>
                         <h5 class="text-center">{{ $template->name }}</h5>
                         <form id="fb-editor">
                         </form>
                         <div class="guardar">
                                    <a href="{{ url()->previous() }}">@lang('answer.cancelar')</a>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">@lang('answer.responder')</button>
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
    fields, templates,
      i18n: {
        preloaded: {
          'en-US': {
            close: "Guardar",
            addOption: 'Agregar item +',
            required: "Requerido",
            label: "Etiqueta",
            placeholder: "Ejemplo"
          }
        }
      },
      defaultFields: formData,
      typeUserDisabledAttrs: {
        'starRating': [
          'placeholder'
        ],
        'slider': [
          'placeholder'
        ],
        'select': [
          'placeholder'
        ]
      },
      disabledActionButtons: ['data','save','clear'],
      controlPosition: 'right',
      prepend: '<h5 class="text-center">{{ $template->name }}</h5>',
       controlOrder: [
        'title',
        'text',
        'textarea'
       ],
      disabledAttrs: ['description','access','maxlength','subtype','inline','toggle'],
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number','paragraph','header','radio-group','select','matriz','checkbox-group','text','textarea'],
      defaultFields: [
      {
        label: 'Imagen',
        type: 'file',
        required: true,
        className: 'form-control',
        icon: '<i class="fa fa-image"></i>'
      },
      ],
      inputSets: [
      {
        label: 'Contact Information',
        name: 'contact-information', // optional - one will be generated from the label if name not supplied
        icon: '<i class="fa fa-info"></i>',
        showHeader: true, // optional - Use the label as the header for this set of inputs
        fields: [
            {
              type: 'text',
              label: 'Nombre',
              required: '',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Apellido',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Empresa',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Telefono',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Direccion',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Ciudad',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Pais',
              className: 'form-control'
            },
            {
              type: 'select',
              label: 'Sexo',
              className: 'form-control'
            },
            {
              type: 'date',
              label: 'Fecha de Nacimiento',
              className: 'form-control'
            }
          ]
      },
      {
        label: 'Multiple Textbooks',
        name: 'multiple-textbook',
        type: 'form',
        icon: '<i class="fa fa-book"></i>',
        showHeader: true, 
        fields: [
            {
              type: 'text',
              label: 'Aqui va tu pregunta',
              placeholder: 'Aqui va tu respuesta',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Aqui va tu pregunta',
              placeholder: 'Aqui va tu respuesta',
              className: 'form-control'
            },
            {
              type: 'text',
              label: 'Aqui va tu pregunta',
              placeholder: 'Aqui va tu respuesta',
              className: 'form-control'
            }
        ]
      },
      {
        label: 'Matrix',
        name: 'matrix', // optional - one will be generated from the label if name not supplied
        showHeader: true, // optional - Use the label as the header for this set of inputs
        icon: '<i class="fa fa-th"></i>',
        fields: [
            {
              label: 'Nombre de Renglón',
              type: 'text',
              placeholder: '¿Qué tan bueno es el servicio?',
              className: 'form-control'
            },
            {
              label: 'Nombre de Columna',
              type: 'text',
              placeholder: 'Satisfecho',
              className: 'form-control'
            },
          ]
      },
      {
        label: 'Ranking',
        name: 'ranking', // optional - one will be generated from the label if name not supplied
        showHeader: true, // optional - Use the label as the header for this set of inputs
        icon: '<i class="fa fa-bars"></i>',
        fields: [
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
          ]
      },
      {
        label: 'Star Rating',
        name: 'starRating',
        icon: '<i class="fa fa-star"></i>',
        fields: [{
          label: 'Star Rating',
          type: 'starRating'
        }]
      },
      {
        label: 'Slider',
        name: 'slider',
        icon: '<i class="fa fa-sliders"></i>',
        fields: [{
          label: 'Slider',
          type: 'slider'
        }]
      },
      {
        label: 'Matrix Ranking Scale',
        name: 'matrix-ranking', // optional - one will be generated from the label if name not supplied
        showHeader: true, // optional - Use the label as the header for this set of inputs
        icon: '<i class="fa fa-th"></i>',
        fields: [
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
            {
              type: 'select',
              label: 'Aqui va tu respuesta',
              className: 'form-control',
              values: [
                {
                  label: '1',
                  value: '1',
                  selected: false
                },
                {
                  label: '2',
                  value: '2',
                  selected: false
                },
                {
                  label: '3',
                  value: '3',
                  selected: false
                }
              ]
            },
          ]
      },
      ]
    };

    //var formBuilder = $(fbRender).formBuilder(options);
let fields = [{
  label: 'Star Rating',
  attrs: {
    type: 'starRating'
  },
  icon: '<i class="fa fa-star"></i>'
},
{
      label: 'Imagen',
      attrs: {
      type: 'file'
    },
    icon: '<i class="fa fa-image"></i>'
},
{
  label: 'Slider',
  attrs: {
    type: 'slider'
  },
  icon: '<i class="fa fa-sliders"></i>'
},
{
  label: 'Texto',
  type: 'header'
},
{
  label: 'Multiple Choice',
  type: 'radio-group'
},
{
  label: 'Dropdown',
  type: 'select'
},
{
  label: 'Single TextBox',
  type: 'text'
}
];
let templates = {
    starRating: function(fieldData) {
    return {
      field: '<input type="hidden" name="star'+fieldData.name+'" id="star'+fieldData.name+'"><span id="'+fieldData.name+'">',
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
      field: '<div style="display:flex; justify-content:space-between; color:black; font-size:25px;"><span align="left">0%</span><span align="center">50%</span><span align="right">100%</span></div><br><input type="hidden" name="slider'+fieldData.name+'" min="0" max="100" step="50" id="slider'+fieldData.name+'"><div id="'+fieldData.name+'"></div>',
      onRender: function() {
        $(document.getElementById(fieldData.name)).slider({
      range: "max",
      min: 0,
      max: 100,
      step: 50,
      value: 1,
      slide: function( event, ui ) {
        $( "#slider"+fieldData.name ).val( ui.value );
      }
    });
    
    }
    }
  }

};

  var formRenderOpts = {
    fields, templates,
      fbRender,
    formData,
    dataType: 'json'
  };

  console.log(formRenderOpts);

 $(fbRender).formRender(formRenderOpts);


    document.getElementById('save-data').addEventListener('click', function() {
        var $form = $("#fb-editor");
        var formdata = JSON.stringify($form.serializeArray());
        var id_template=$("#template_id").val();
        var token=$("#csrf-token").val();
      
      console.log(formdata);

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
        swal({
                position: 'center',
                title: 'Tus respuestas fueron guardadas correctamente.',
                type: 'success'
            }).then(function() {
                window.location = "{{url('encuestas_publicas')}}";
            });
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console

        console.log(jqXHR);

        if(jqXHR.responseText=='"maximo"')
        {
            {{-- alert('');
            $(location).attr('href', '/') --}}
            swal({
                position: 'center',
                title: 'Esta encuesta ha alcanzado el límite máximo de respuestas.<br>Intenta con otra.',
                type: 'error'
            }).then(function() {
                window.location = "{{url('encuestas_publicas')}}";
            });
        }

        if(jqXHR.responseText=='"ip"')
        {
            swal({
                position: 'center',
                title: 'Ya has respondido esta encuesta.<br>Intenta con otra.',
                type: 'error'
            }).then(function() {
                window.location = "{{url('encuestas_publicas')}}";
            });
        }

        /*console.error(
            "Ha ocurrido un error: "+
            textStatus, errorThrown
        );
        alert('Ya has respondido esta encuesta. Intenta con otra.');
        $(location).attr('href', '/')*/

    });
    });

});
  </script>


@endpush