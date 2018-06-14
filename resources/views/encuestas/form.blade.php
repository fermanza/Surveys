@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.header')
@section('content')

<style>
.clear-all,.get-data,.save-template,.fld-className,.fld-name,.fld-other,.name-wrap,.className-wrap,.fld-value,.value-wrap,.fld-multiple,.multiple-wrap
{
visibility:hidden;
} 
.render-wrap {
  display: none;
}
.build-wrap
{
  position: relative;
}
.survey
{
  position: relative;
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
                                <li><a href="{{ URL('/')}}" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="panel panel-default" align="right">
                                <div class="panel-heading active" align="right">
                                    <div class="panel-title">
                                            <span class="btn btn-success">@lang('mis_encuestas.tipoPregunta') <span class="q" data-placement="center" title="Ayuda"><i class="fa fa-question-circle"></i></span></i></span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="container">
                      <div class="survey">
                        <form id="fb-editor"><div class="build-wrap"></div></form>
                      </div>
                         <div class="guardar">
                                    <a href="{{ url()->previous() }}">@lang('mis_encuestas.cancelar')</a><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">@lang('mis_encuestas.guardar')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </section>

@stop

<style>
.rangeslider-wrap {
  padding-top: 100px;
}

.rangeslider {
  position: relative;
  height: 4px;
  border-radius: 5px;
  width: 100%;
  background-color: gray;
}
.rangeslider__handle {
  transition: background-color 0.2s;
  box-sizing: border-box;
  width: 20px;
  height: 20px;
  border-radius: 100%;
  background-color: #0099ff;
  touch-action: pan-y;
  cursor: pointer;
  display: inline-block;
  position: absolute;
  z-index: 3;
  top: -8px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5), inset 0 0 0 2px white;
}
.rangeslider__handle__value {
  transition: background-color 0.2s, box-shadow 0.1s, transform 0.1s;
  box-sizing: border-box;
  width: 90px;
  text-align: center;
  padding: 10px;
  background-color: #0099ff;
  border-radius: 5px;
  color: white;
  left: -35px;
  top: -55px;
  position: absolute;
  white-space: nowrap;
  border-top: 1px solid #007acc;
  box-shadow: 0 -4px 1px rgba(0, 0, 0, 0.07), 0 -5px 20px rgba(0, 0, 0, 0.3);
}
.rangeslider__handle__value:before {
  transition: border-top-color 0.2s;
  position: absolute;
  bottom: -10px;
  left: calc(50% - 10px);
  content: "";
  width: 0;
  height: 0;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid;
  border-top-color: #0099ff;
}
.rangeslider__handle__value:after {
  content: " cm";
}
.rangeslider__fill {
  position: absolute;
  top: 0;
  z-index: 1;
  height: 100%;
  background-color: #0099ff;
  border-radius: 5px;
}
.rangeslider__labels {
  position: absolute;
  width: 100%;
  z-index: 2;
  display: flex;
  justify-content: space-between;
}
.rangeslider__labels__label {
  font-size: 0.75em;
  position: relative;
  padding-top: 15px;
  color: gray;
}
.rangeslider__labels__label:before {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  content: "";
  width: 1px;
  height: 9px;
  border-radius: 1px;
  background-color: rgba(128, 128, 128, 0.5);
}
.rangeslider__labels__label:first-child:before, .rangeslider__labels__label:last-child:before {
  height: 12px;
  width: 2px;
}
.rangeslider__labels__label:first-child:before {
  background-color: #0099ff;
}
.rangeslider__labels__label:last-child:before {
  background-color: gray;
}
.rangeslider__labels__label:first-child {
  transform: translateX(-48%);
}
.rangeslider__labels__label:last-child {
  transform: translateX(48%);
}
.rangeslider.rangeslider--active .rangeslider__handle,
.rangeslider.rangeslider--active .rangeslider__handle * {
  background-color: #33adff;
}
.rangeslider.rangeslider--active .rangeslider__handle *:before {
  border-top-color: #33adff;
}
.rangeslider.rangeslider--active .rangeslider__handle__value {
  transform: translateY(-5px);
  box-shadow: 0 -3px 2px rgba(0, 0, 0, 0.04), 0 -9px 25px rgba(0, 0, 0, 0.15);
}
</style>

@push('script')
  <script>
  $(document).ready(function() {
      

let fields = [{
  label: 'Star Rating',
  attrs: {
    type: 'starRating'
  },
  icon: '<i class="fa fa-star"></i>'
},
{
      label: 'Contact Information',
      attrs: {
      type: 'contactInformation'
    },
    icon: '<i class="fa fa-info"></i>'
},
{
      label: 'Multiple Textbox',
      attrs: {
      type: 'multipleText'
    },
    icon: '<i class="fa fa-book"></i>'
},
{
      label: 'Imagen',
      attrs: {
      type: 'file'
    },
    icon: '<i class="fa fa-image"></i>'
},
{
      label: 'Ranking',
      attrs: {
      type: 'select'
    },
    icon: '<i class="fa fa-star"></i>'
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
      field: '<span id="'+fieldData.name+'">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
      }
    };
  },
 contactInformation: function(fieldData) {
   return {
     field: '<input type="text" id="'+fieldData.name+'" class="form-control" placeholder="Nombre" name="name"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Apellido" name="last_name"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Empresa" name="company"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Email" name="email"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Teléfono" name="phone"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Dirección" name="address"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Ciudad" name="city"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="País" name="country"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Sexo" name="sex"><br><input type="text" id="'+fieldData.name+'1" class="form-control" placeholder="Fecha de Nacimiento" name="datebirth"><br>',
     onRender: function() {
       $(document.getElementById(fieldData.name));
       $(document.getElementById(fieldData.name+1));
       $(document.getElementById(fieldData.name+2));
       $(document.getElementById(fieldData.name+3));
       $(document.getElementById(fieldData.name+4));
       $(document.getElementById(fieldData.name+5));
       $(document.getElementById(fieldData.name+6));
       $(document.getElementById(fieldData.name+7));
       $(document.getElementById(fieldData.name+8));
       $(document.getElementById(fieldData.name+9));
     }
   };
 },
  multipleText: function(fieldData) {
   return {
     field: '<input type="text" id="'+fieldData.name+'" class="form-control" value="Primer box" name="first"><br><input type="text" id="'+fieldData.name+'1" class="form-control" value="Segundo box" name="second"><br><input type="text" id="'+fieldData.name+'2" class="form-control" value="Tercer box" name="third">',
     onRender: function() {
       $(document.getElementById(fieldData.name));
       $(document.getElementById(fieldData.name+1));
       $(document.getElementById(fieldData.name+2));
     }
   };
 },
  slider: function(fieldData) {
    return {
      field: '<div style="display:flex; justify-content:space-between; color:black; font-size:25px;"><span align="left">0%</span><span align="center">50%</span><span align="right">100%</span></div><input id='+fieldData.name+' type="range" min="0" max="100" step="50" data-orientation="vertical">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rangeslider();
      }
    };
  }

};


  var options = {
    fields, templates,
      i18n: {
        preloaded: {
          'en-US': {
            close: "Guardar",
            label: "Input",
            placeholder: "Ejemplo"
          }
        }
      },
      controlPosition: 'right',
      prepend: '<h5 class="text-center">{{ $template->name }}</h5>',
       controlOrder: [
        'title',
        'text',
        'textarea'
       ],
      disabledAttrs: ['description','access','maxlength','subtype','required','inline','toggle'],
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number','paragraph','header','file','radio-group','select','matriz','checkbox-group','text','textarea']
    };
    var fbEditor = document.getElementById('fb-editor');
    var formBuilder = $(fbEditor).formBuilder(options);

    document.getElementById('save-data').addEventListener('click', function() {
    var jsondata=formBuilder.actions.getData('json');
    var templateid=document.getElementById('template_id');
    var token=document.getElementById('csrf-token');

    // var data={
    //     content:jsondata,
    //     template_id:templateid.value,
    //     _token:token.value
    // };

    var formData = new FormData();

    formData.append('content',jsondata);
    formData.append('template_id',templateid.value);
    formData.append('_token',token.value);
    formData.append('saveImage',$('input:file')[0].files[0]);

    // console.log($('input:file')[0].files[0]);
    // console.log(data);

    // Fire off the request to /form.php
    request = $.ajax({
        url: '{{url('saveQuestion')}}',
        type: "post",
        data: formData,
        contentType: false,
        processData: false
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
        swal({
          position: 'center',
          title: 'Encuesta creada correctamente.',
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