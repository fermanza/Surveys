@extends('layouts.master')
@section('title', 'Mis encuestas')

@extends('includes.header')
@section('content')

<style>
.tabla
{
    color: black;
}
.respuesta
{
    color: black;
    font-size: 18px;
}
</style>

  <section class="bread wow fadeIn padding-25px-tb margin-bread">
  <div class="container">
      <div class="row equalize xs-equalize-auto">
          <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
              <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                  <!-- start page title -->
                  <h1 class="no-margin-bottom">Respuestas</h1>
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
                      <li><a href="{{ URL('/encuestas_publicas')}}" class="text-dark-gray">@lang('encuestas_publicas.encuestasPublicas')</a></li>
                      <li class="text-dark-gray">Respuestas</li>
                  </ul>
                  <!-- end breadcrumb -->
              </div>
          </div>
      </div>
  </div>
  </section>
  <!-- end page title section -->


  <section class="tabla">
  <div class="container">
      <div class="col-md-12">
          <div class="panel panel-default">
     <div class="col-md-12" align="center">
        @if($template->url != null)
          <img src="{{ URL($template->url) }}" style="width: auto !important; height: auto !important; max-width: 20%;"><br><br>
        @endif
        <h5><strong>{{ $template->name }}</strong></h5>
     </div>

  <table id="table-mis-respuestas" class="display col-md-12" align="center">
  <tbody>
    @php
      $flag = true;
      $matrix = array('matrix', 'matrix-scale');
      for($i = 0; $i < count($printQuestions); $i++){
    @endphp
        <tr>
          <td>
            @php
              if( $flag ||
                  ($printQuestions[$i]->answer_id != $printQuestions[$i-1]->answer_id) ){

                echo '<hr /><b>Usuario: '.$printQuestions[$i]->user_name."</b>";
                $flag = false;
              }
            @endphp
          </td>
        </tr>
        @php
        if (in_array($printQuestions[$i]->type, $matrix)){
          for($j = 0; $j < count($printQuestions[$i]->answer); $j++){
          @endphp
            <tr>
              <td>
                <br />
                <b> Pregunta: </b>{{ $printQuestions[$i]->title[0] }}
              </td>
            </tr>
            <tr>
              <td>
                <b> Respuesta: </b>{{ $printQuestions[$i]->answer[$j] }}
              </td>
            </tr>
        @php
          }
        }
        else{
          for($j = 0; $j < count($printQuestions[$i]->title); $j++){
          @endphp
            <tr>
              <td>
                <br />
                <b> Pregunta: </b>{{ $printQuestions[$i]->title[$j] }}
              </td>
            </tr>
            <tr>
              <td>
                <b> Respuesta: </b>{{ $printQuestions[$i]->answer[$j] }}
              </td>
            </tr>
    @php
          }
        }
      }
    @endphp
  </tbody>
  </table>

  <div class="col-md-12" align="right">
    <br />
    <a class="btn btn-default" href="{{ url('/mis_encuestas') }}">@lang('answer.regresar')</a>
  </div>

  </div>
</div>
</div>
</section>

    @push('script')

    <script type="text/javascript">
  var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    ,  template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

        $(document).ready(function() {
         $('.buton').click(function(){
          let index = $(this).val();

         var data_type = 'data:application/vnd.ms-excel;charset=utf-8,';
          var a = document.createElement('a');

          var table_div = document.getElementById('table-mis-respuestas');
          var table_html = table_div.outerHTML.replace(/ /g, '%20');
          a.href = data_type + ', ' + table_html;
          //setting the file name
          a.download = 'exported_table.xls';
          //triggering the function
          a.click();

        });
} );


    </script>

   @endpush
@stop
