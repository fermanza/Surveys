@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.header')
@section('content')

<style>
.clear-all,.get-data,.save-template,.fld-className,.fld-name,.fld-other,.name-wrap,.className-wrap,.fld-value,.value-wrap,.fld-multiple,.multiple-wrap,.option-selected
{
visibility:hidden;
}
.form-actions
{
  display: none;
}
.btn-group
{
  display: none;
}
.survey
{
  position: relative;
}

  td, th {
  width: 4rem;
  height: 2rem;
  border: 1px solid #ccc;
  text-align: center;
}
th {
  background: lightblue;
  border-color: white;
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
                                <li><a href="{{ URL('/encuestas')}}" class="text-dark-gray">@lang('mis_encuestas.creacionEncuesta')</a></li>
                                <li class="text-dark-gray">{{ $template->name }}</li>
                               <div class="col-md-12" align="center">
                                  @if($template->url != null)
                                    <img src="{{ URL($template->url) }}" style="width: auto !important; height: auto !important; max-width: 20%;"><br><br>
                                  @endif
                               </div>
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
                        <h5 class="font-weight-700 text-extra-dark-gray">{{ $template->name }}</h5>
                    </div>
                </div>
            </div>
        </section>


       <div class="content">
        <div class="row">
          <div class="tipos">
            <div class="col-md-9 col-xs-8">
              <div class="panel panel-default active" align="right">
                  <div class="panel-heading">
                      <div class="panel-title btn-extra-large btn-success" align="center">
                          <span class="btn-medium btn-success">@lang('crear_encuesta.encuesta')</span>
                      </div>
                  </div>
              </div>
            </div>
           <div class="col-md-3 col-xs-4">
               <div class="panel panel-default active" align="right">
                   <div class="panel-heading">
                          <div class="panel-title btn-extra-large btn-success" align="center">
                              <span class="btn-medium btn-success">@lang('mis_encuestas.tipoPregunta')<span class="q" data-placement="center" title="Ayuda"><i class="fa fa-question-circle"></i></span></i></span>
                          </div>
                   </div>
               </div>
            </div>
          </div>
        </div>

        <div class="build-form"></div>
        <div id="frmb-1530894508889-form-wrap" class="form-wrap form-builder">
          <div id="frmb-1530893257192-cb-wrap" class="cb-wrap pull-right" style="display: table">
            <ul id="frmb-1530893184939-control-box" class="frmb-control ui-sortable">
              <li class="input-set-control input-set-10 ui-sortable-handle" data-type="contact-info" id="printContactInfo" >
                <span class="control-icon">
                  <i class="fa fa-info"></i>
                </span>Contact Information
              </li>
              <li class="input-set-control input-set-10 ui-sortable-handle" data-type="multiple-textbook" id="printMultipleTextBooks" >
                <span class="control-icon">
                  <i class="fa fa-book"></i>
                </span>Multiple Textbooks
              </li>
              <li class="input-set-control input-set-2 ui-sortable-handle" data-type="ranking" id="printRanking" >
                <span class="control-icon">
                  <i class="fa fa-bars"></i>
                </span>Ranking
              </li>
              <li class="input-set-control input-set-10 ui-sortable-handle" data-type="matrix" id="printMatrix" >
                <span class="control-icon">
                  <i class="fa fa-th"></i>
                </span>Matrix
              </li>
              <li class="input-set-control input-set-11 ui-sortable-handle" data-type="matrix-ranking"
                onclick="printMatrixPrinting()">
                <span class="control-icon">
                  <i class="fa fa-th"></i>
                </span>Matrix Ranking Scale
              </li>
            </ul>
            </div>
          </div>






        </div>


            <div class="row">
              <div class="col-md-12" align="center">
                <br>
                                    <a class="btn btn-default" href="{{ url()->previous() }}">@lang('mis_encuestas.cancelar')</a><br><br><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data" onclick="sendData()" >@lang('mis_encuestas.guardar')</button><br><br><br>
                  </div>
                </div>



<body>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo.css')}}">
  <script src="{{asset('assets/js/vendor.js')}}"></script>
  <script src="{{asset('assets/js/form-builder.min.js')}}"></script>
  <script src="{{asset('assets/js/form-render.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.1/jquery.rateyo.min.js"></script>
  <script src="{{asset('assets/js/demo.js')}}"></script>
</body>

@stop

<style>

/*.rangeslider-wrap {
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
  background-color: #82d856;
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
  background-color: #82d856;
  border-radius: 5px;
  color: white;
  left: -35px;
  top: -55px;
  position: absolute;
  white-space: nowrap;
  border-top: 1px solid #82d856;
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
  border-top-color: #82d856;
}
.rangeslider__handle__value:after {
  content: " cm";
}
.rangeslider__fill {
  position: absolute;
  top: 0;
  z-index: 1;
  height: 100%;
  background-color: #82d856;
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
  background-color: #82d856;
}
.rangeslider__labels__label:first-child:before, .rangeslider__labels__label:last-child:before {
  height: 12px;
  width: 2px;
}
.rangeslider__labels__label:first-child:before {
  background-color: #82d856;
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
  background-color: #82d856;
}
.rangeslider.rangeslider--active .rangeslider__handle *:before {
  border-top-color: #82d856;
}
.rangeslider.rangeslider--active .rangeslider__handle__value {
  transform: translateY(-5px);
  box-shadow: 0 -3px 2px rgba(0, 0, 0, 0.04), 0 -9px 25px rgba(0, 0, 0, 0.15);
}*/
</style>

@push('script')

  <script  src="{{asset('js/matrixscript.js')}}"></script>
  <script  src="{{asset('js/contact-info-script.js')}}"></script>
  <script  src="{{asset('js/multiple-text-script.js')}}"></script>
  <script  src="{{asset('js/rankingscript.js')}}"></script>

  <script>
$(document).ready(function() {

  /*  $('#printMatrix').click(function(){
          $('.frmb').append("<div class='matrix-container'> <p>Hola</p> <button id='close'>close</button>  </div>");
    });

    $('#close').click(function(){
         $(this).remove();
    })*/

var fbEditor = document.getElementsByClassName("build-form");

let fields = [
{
        label: 'Texto',
        name: 'texto',
        type: 'header',
        fields: [{
          type: 'header',
          label: 'Texto'
        }]
      },
      {
        label: 'Multiple Choice',
        name: 'multiple-choice',
        type: 'radio-group',
        className: 'form-control',
        fields: [{
          type:'radio-group',
          label: 'Multiple Choice',

        }]
      },
      {
        label: 'Single TextBox',
        name: 'single-textbox',
        type: 'text',
        className: 'form-control',
        fields: [{
          type: 'text',
          label: 'Single TextBox'
        }]
      },
      {
        label: 'Dropdown',
        name: 'dropdown',
        type: 'select',
        className: 'form-control',
        fields: [{
          type: 'select',
          label: 'Dropdown'
        }]
      },
      {
        label: 'Image',
        name: 'image',
        type: 'file',
        className: 'form-control',
        fields: [{
          type: 'file',
          label: 'Image'
        }]
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

contactInfo: function(fieldData) {
    return {
      field:  "<div class='contactInfo-container-"+fieldData.name+"'>"+
            "<div class='container-buttons' align='right'>"+
                "<h6>Contact Information</h6>"+
                "<button class='btn btn-danger' style='color:white;' onclick='closeComponentContactInfo(\""+fieldData.name+"\")' align='center'><i class='fa fa-window-close'></i></button>"+
                "<input type='text' class='form-control' placeholder='Nombre' /><br>"+
                "<input type='text' class='form-control' placeholder='Apellido' /><br>"+
                "<input type='text' class='form-control' placeholder='E-mail' /><br>"+
                "<input type='text' class='form-control' placeholder='Empresa' /><br>"+
                "<input type='text' class='form-control' placeholder='Teléfono' /><br>"+
                "<input type='text' class='form-control' placeholder='Dirección' /><br>"+
                "<input type='text' class='form-control' placeholder='Ciudad' /><br>"+
                "<input type='text' class='form-control' placeholder='País' /><br>"+
                "<input type='text' class='form-control' placeholder='Sexo' /><br>"+
                "<input type='date' class='form-control' placeholder='Fecha de Nacimiento' /><br>"+
            "</div>"+
            "<div class='contactInfo-content-"+fieldData.name+"'></div>"
        +"</div>",
        onRender: function() {
             console.log("render contact information", fieldData);
        }




      //'<div align="right"><button class="btn" style="color:white;" id="button-addQues+'+fieldData.name+'" onclick="addQues('+fieldData.name+')">Agregar pregunta</button><button class="btn btn-danger" style="color:white;" " onclick="closeComponentContactInfo('+fieldData.name+')" align="center"><i class="fa fa-window-close"></i></button></div><input type="text" placeholder="Nombre" class="form-control" name="name'+fieldData.name+'"><br><input type="text" placeholder="Apellido" class="form-control" name="lastName'+fieldData.name+'">',
    }
  },

  // temp: function(fieldData) {
  //   return {
  //     field:  "<input type='text' id="+ fieldData.name+" >"+
  //             "<input type='text' id="+fieldData.name+">"
  //     ,
  //     onRender: function() {

  //     }
  //   };
  // },

slider: function(fieldData) {
    return {
      field: '<div class="slidecontainer"><div style="display:flex; justify-content:space-between; color:black; font-size:25px;"><span align="left">0%</span><span align="center">50%</span><span align="right">100%</span></div><br><input type="range" class="slider" name="slider'+fieldData.name+'" min="0" max="100"></div>',
    }
  }

};


  var options = {
    fields, templates,
    controlPosition: 'right',
      i18n: {
        preloaded: {
          'en-US': {
            close: "Guardar",
            addOption: 'Agregar opción +',
            required: "Requerido",
            label: "Etiqueta",
            placeholder: "Ejemplo",
            remove: " X "
          }
        }
      },
      typeUserDisabledAttrs: {
        'starRating': [
          'placeholder'
        ],
        'slider': [
          'placeholder'
        ],
        'select': [
          'placeholder'
        ],
        'textarea': [
          'rows'
        ],
        'date': [
          'placeholder'
        ],
        'file':
        [
          'placeholder'
        ],
        'header':
        [
          'options'
        ]
      },
      // typeUserAttrs: {
      //   radio-group: {
      //     multiple: {
      //       label: 'Multiples Selecciones'
      //     }
      //   }
      // },
      disabledActionButtons: ['data','save','clear'],
      prepend: '<h5 class="text-center">{{ $template->name }}</h5>',
      disabledAttrs: ['description','access','maxlength','subtype','inline','toggle'],
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number','paragraph','header','radio-group','select','matriz','checkbox-group','text','textarea'],
      inputSets: [
      {
        label: 'Image',
        name: 'image',
        type: 'file',
        className: 'form-control',
        icon: '<i class="fa fa-image"></i>',
        fields: [{
          type: 'file',
          label: 'Imagen (tamaño máximo 1Mb)'
        }]
      },
      {
        label: 'Comment Box',
        name: 'commentBox',
        className: 'form-control',
        icon: '<i class="fa fa-comment"></i>',
        fields: [{
          type: 'textarea',
          label: 'Comment Box'
          }]
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
        label: 'Contact Information',
        name: 'contactInfo',
        icon: '<i class="fa fa-info"></i>',
        fields: [{
          label: 'Contact Information',
          type: 'contactInfo'
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
      ]
    };

    //$('.build-wrap').formBuilder();

    var formBuilder = $(fbEditor).formBuilder(options);

    //console.log(formBuilder);
    // $('.option-label').on('change',function(){
    //    console.log($(this));

    // });

    document.getElementById('guardar').addEventListener('click', function() {

      swal({
          position: 'center',
          title: 'Encuesta creada correctamente.<br>Se ha enviado para aprobación<br>de la misma.',
          type: 'success'
      }).then(function() {
          window.location = "{{url('mis_encuestas')}}";
      });
    });

    var jsondata=formBuilder.actions.getData('json');
    var templateid=document.getElementById('template_id');
    var token=document.getElementById('csrf-token');

    //console.log(jsondata);
    let formInfo = JSON.parse(jsondata);
    var matrixInfo = sendData();
    var contactInfo = sendDataContactInfo();


    formInfo.forEach(function(element, key) {
       if(isEmpty(element)){
         delete formInfo[key];
       }
    });


    if(matrixInfo.length>0){
      formInfo.push({matrix:matrixInfo});
    }

   formInfo = JSON.stringify(formInfo);

    // var data={
    //     content:jsondata,
    //     template_id:templateid.value,
    //     _token:token.value
    // };
    var formData = new FormData();


    //formData.append('matrix', matrixInfo);

    console.log(formInfo);

    if ($('input:file')[0]==undefined) {
    formData.append('content',formInfo);
    formData.append('template_id',templateid.value);
    formData.append('_token',token.value);
    }
    else {
      formData.append('content',formInfo);
      formData.append('template_id',templateid.value);
      formData.append('_token',token.value);
      // formData.append('saveImage',$('input:file')[0].files);
      var i = 0;
      while( $('input:file')[i] != undefined ){
        formData.append('saveImage',$('input:file')[i].files);
         i++;
      }
    }



    /*console.log($('input:file')[0].files[0]);
    console.log(data);*/

   // Fire off the request to /form.php
    request = $.ajax({
        url: '{{url('saveQuestion')}}',
        type: "post",
        data:formData,
        contentType: false,
        processData: false
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log(response);
        console.log("Hooray, it worked!");
        swal({
          position: 'center',
          title: 'Encuesta creada correctamente.<br>Se ha enviado para aprobación<br>de la misma.',
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
