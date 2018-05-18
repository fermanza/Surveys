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
                                                  <span class="btn btn-success">Tipo de pregunta <span class="q" data-placement="center" title="Ayuda"><i class="fa fa-question-circle"></i></span></i></span>
                                          </div>
                                      </div>
                              </div>
                          </div>
                          <br><br>
                         <form id="fb-editor"></form>
                            <div class="guardar">
                                    <a href="{{ url()->previous() }}">Cancelar</a>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">Guardar</button>
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
  icon: '🌟'
},
{
  label: 'Slider',
  attrs: {
    type: 'slider'
  },
  icon: '↔️'
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
      field: '<button style="color:#FFF;" class="btn">Nueva Fila</button> <button style="color:#FFF;" class="btn">Nueva Columna</button><table id='+fieldData.name+'><tr><td></td><td><input type="text"></td></tr><tr><td><input type="text"></td><td><input type="checkbox"></td></tr></table>',
      onRender: function() {
          

      }
    };
  }

};


  var options = {
    disabledAttrs: [
    'name',
    'className'
  ],
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
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number'] 
    };

var fbRender = document.getElementById('fb-editor');
var formData = JSON.parse('<?php echo json_encode($question->content) ?>');
var options = {
  disabledAttrs: [
    'name',
    'className'
  ],
  fields, templates,
  i18n: {
        locale: 'es-ES'
      },
      defaultFields: formData,
       controlPosition: 'left',
      prepend: '<h5 class="text-center">{{ $template->name }}</h5>',
       controlOrder: [
        'title',
        'text',
        'textarea'
       ],
      disableFields: ['file', 'date', 'autocomplete','button','hidden','number','matriz'] 
    };

    var formBuilder = $(fbRender).formBuilder(options);


  /*var formRenderOpts = {
      fbRender,
    formData,
    dataType: 'json'
  };*/

  console.log(formData);

 // $(fbRender).formRender(formRenderOpts);


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
          title: 'Encuesta editada.',
          type: 'success'
      }).then(function() {
          window.location = "/mis_encuestas";
      });
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