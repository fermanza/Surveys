@extends('layouts.master')
@section('title', 'Responder Encuesta')

@extends('includes.header')
@section('content')

<style>
.clear-all,.get-data,.save-template,.fb-file
{
visibility:hidden;
}


.sticky
{
    font-size: 20px;
    color: black;
    margin-bottom: 15px;
}

table, th, td, tr {
    border: 1px solid black;
    width: 300px;
    height: 50px;
    font-size: 15px;
    color: black;
    text-align: center;
    padding: 10px;
}

td, tr {
border: 1px solid black;
    width: 300px;
    height: 50px;
    font-size: 15px;
    color: black;
    text-align: center;
    padding-left: 57px;
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
                                <li><a href="{{ URL('/')}}" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li class="text-dark-gray">@lang('answer.responderEncuesta')</li>
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
                          @if($template->url != null)
                            <img src="{{ URL($template->url) }}" style="width: auto !important; height: auto !important; max-width: 20%;"><br><br>
                          @endif
                          </div>
                         <h5 class="text-center">{{ $template->name }}</h5>
                         <form id="fb-editor">

                         </form>
                         
                         
                        </div>

                </div>

                 <div class="row">
              <div class="col-md-12" align="center">
                <br>
                                    <a class="btn" href="{{ url()->previous() }}">@lang('answer.cancelar')</a><br><br><input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <input type="hidden" id="template_id" name="template_id" class="form-control" value="{{ $template->id }}">
                                    <button class="btn" id="save-data">@lang('answer.responder')</button><br><br><br>
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

// console.log(formData);

//create Tabulator on DOM element with id "example-table"
// $("#tabulator-example").tabulator({
//     height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
//     layout:"fitColumns", //fit columns to width of table (optional)
//     columns:[ //Define Table Columns
//         {title:"", field:"label", width:150, align:"center"},
//         {title:"", field:"type", align:"center"},
//         {title:"", field:"type",align:"center"}
//     ],
//     rowClick:function(e, row){ //trigger an alert message when the row is clicked
//         alert("Row " + row.getData().id + " Clicked!!!!");
//     },
// });

let fields = [
{
  label: 'Texto',
  type: 'header'
},
{
  label: 'Multiple Choice',
  type: 'radio-group',
  value: 'label'
},
{
  label: 'Dropdown',
  type: 'select'
},
{
  label: 'Single TextBox',
  type: 'text'
},
{
    label: 'Imagen',
    type: 'file',
    className: 'form-control',
    icon: '<i class="fa fa-image"></i>'
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
      field: '<div class="""slidecontainer"><div style="display:flex; justify-content:space-between; color:black; font-size:25px;"><span align="left">0%</span><span align="center">50%</span><span align="right">100%</span></div><br><input type="range" class="slider" name="slider'+fieldData.name+'" min="0" max="100"></div>',
     //field: '<div style="display:flex; justify-content:space-between; color:black; font-size:25px;"><span align="left">0%</span><span align="center">50%</span><span align="right">100%</span></div><br><input type="hidden" name="slider'+fieldData.name+'" id="slider'+fieldData.name+'"><div id="'+fieldData.name+'"></div>',
    //   onRender: function() {
    //   $(document.getElementById(fieldData.name)).slider({
    //   range: "max",
    //   min: 0,
    //   max: 100,
    //   step: 50,
    //   value: 1,
    //   slide: function( event, ui ) {
    //     $( "#slider"+fieldData.name ).val( ui.value );
    //   }
    // });
    
    // }
    }
  }

};

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
              className: 'form-control',
              type: 'radio-group',
              values: [{
              label: 'Nombre de la Columna',
              value: 'test-value'
            }]
      },
            {
              label: 'Nombre de Renglón',
              className: 'form-control',
              type: 'radio-group',
              values: [{
              label: 'Nombre de la Columna',
              value: 'test-value'
            }]
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

  var formRenderOpts = {
    fields, templates,
      fbRender,
    formData,
    dataType: 'json'
  };

$(fbRender).formRender(formRenderOpts);


//Tabla renderizada de Matrix 
//   let el =  $( "div.rendered-form" ).find('header');
//   let elementColumn = [];
//   let elementRow = [];

//   $.each(el, function(index, value){
//         if($('#'+value.id).hasClass('columna')) {
//             elementColumn.push($('#'+value.id).text());
//         } else if($('#'+value.id).hasClass('renglon')) {
//             elementRow.push($('#'+value.id).text());
//         }

//   });


// console.log(elementColumn, elementRow);

// $( "header.form-control.renglon" ).replaceWith( "<table><tr><th></th><th>"+ '<label for="radio-group-1529180898194-0">Nombre de la Columna</label>' +"</th></tr><tr><td>" + '<label for="radio-group-1529180898186" class="fb-radio-group-label">Nombre de Renglón</label>' + "</td><td>"+'<input name="radio-group-1529180898186" value="test-value" type="radio">'+"</td></tr></table>" );

// $( "header.form-control.columna" ).replaceWith( "<table><tr><th></th><th>"+ '<label for="radio-group-1529180898194-0">Nombre de la Columna</label>' +"</th></tr><tr><td>" + '<label for="radio-group-1529180898186" class="fb-radio-group-label">Nombre de Renglón</label>' + "</td><td>"+'<input name="radio-group-1529180898186" value="test-value" type="radio">'+"</td></tr></table>" );

//  generateTable(elementColumn, elementRow);

// function generateTable(columns, rows) {
      
//   var t = "<table  border='3' >";

//     t += "<thead>";
//     t += "<tr>";
//     for(let x =0; x < columns.length + 1; x++) {   //columns.length
//       if(x == 0) {
//          t += "<th></th>";
//       } else {
//           t += "<th>"
//          t +=  columns[x-1];
//          t += "</th>";    
//       }
//     }
//     t += "</tr>";
//     t += "</thead>";
//     t += "<tbody>";

//     for(let y =0; y < rows.length; y++) {  // rows.length
//         t += "<tr>";
//           t += "<td>";
//           t +=  rows[y];
//           t += "</td>";

        
//         for(let d=0; d < rows.length; d++){
//             t += "<td>";
//             t += "<input name='radio-group-"+y+"'type='radio'>";
//             t += "</td>";
//         }  
//         t += "</tr>";
//     }

//     t += "</tbody>";
//   t += "</table>";
//  $( "div.rendered-form").html(t);
// }


// $( "div.fb-radio-group" )
// var $form = $("#fb-editor");
// var formdata = JSON.stringify($form.serializeArray());

// console.log($form.serializeArray());

    document.getElementById('save-data').addEventListener('click', function() {
        var $form = $("#fb-editor");
        var formdata = JSON.stringify($form.serializeArray());
        var id_template=$("#template_id").val();
        var token=$("#csrf-token").val();
      
     //console.log(formdata);

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
       // console.log(response);
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

        //console.log(jqXHR);

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