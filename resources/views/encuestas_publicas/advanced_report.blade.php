@extends('layouts.master')
@section('title', 'Encuestas Públicas')
@extends('includes.header')
@section('content')

 <style type="text/css">     
    .mybutton {
            font-size: 16px;
            line-height: 16px;
            color: #fff;
            background: #0b2a3e;
            border: 1px solid #0b2a3e;
            text-transform: uppercase;
            padding: 10px 30px;
            font-weight: 600;
            display: inline-block;
            float: right;
    }

 </style>





   <!-- start page title section -->


        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('reporte.reporteAvanzado')</h1>
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
                                <li class="text-dark-gray">@lang('reporte.reporteAvanzado')</li>
                                {{--<li class="text-dark-gray">Encuesta XX</li>--}}
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- end page title section -->
        
        <!-- start form section -->
    <section>   
     <div class="container">
        <div class="row">
            <div class="container tab-style2">
                <div class="tab-content">
                    <!-- start tab content -->
                    <div class="tab-pane med-text fade in active" id="tab_sec1">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <h6>{{ $template->name }}</h6>
                                    <p><b>Respuestas</b></p>
                                    <p> <b>Respondidas:</b> {{ $answerCount }} </p>

                                    @php
                                      $loop = 0;
                                      foreach($options as $key => $option){
                                    @endphp

                                    <div class="pregunta">     
                                        <p>{{ $key }}</p>
                                        <div class="todo">                                          
                                          <div class="titulo">  
                                              <button class="mybutton buton" value="{{ $loop }}" >@lang('reporte.exportar') <i class="fa fa-chevron-right"></i></button>
                                          </div>

                                    <section>
                                      <div class="container">
                                        <div class="chart-render" data-question="{{ json_encode($options) }}">
                                          <canvas id="myChart{{ $loop }}" style="width: 712px; height: 156px"></canvas>
                                        </div>
                                      </div>
                                    </section>  

                                          <div class="tabla-inf">
                                              <table class="table" id="tabla-{{ $loop }}">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">@lang("reporte.opcionesRespuesta")</th>
                                                    <th scope="col"> @lang('reporte.respuestas') </th>
                                                    <th scope="col">@lang('reporte.totales') </th>
                                                  </tr>
                                                </thead>
                                              <tbody>
                                                @php   
                                                  $total = 0;
                                                @endphp
                                                  @foreach($option as $key_option => $opt ) 
                                                      <tr>
                                                        <td>{{ $key_option }}</td>
                                                        <td></td>
                                                        <td>{{ $opt }}</td>
                                                      </tr>
                                                      @php   
                                                        $total = $total + $opt;
                                                      @endphp 
                                                     @if( $loop->last )
                                                          <tr>
                                                            <td>Total</td>
                                                            <td></td>
                                                            <td>{{ $total }}</td>
                                                          </tr>
                                                     @endif
                                                  @endforeach
                                             </tbody>  
                                            </table>
                                          </div>
                                        </div>
                                    </div>
          @php
            $loop++;
          }
          @endphp



  <table id="table-mis-respuestas" class="display">
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
              // dd($printQuestions);
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





                                </div>
                            </div>
                        </div>
                    </div>
   

                    <!-- end tab content -->
                </div>       
            </div>

          </div>
       </div>
        
  </section>

        

@stop



@push('script')



<script type="text/javascript">


 $(document).ready(function() {

 	var labels = [];
 	var values = [];
    $('.chart-render').each(function(index, item){
      var colors = [];
        let question =  $(item).data('question');
        console.log(question);
          for(let element in question){
            console.log(question[element]);
          }
         question.data = question.key.flatMap(x => x.match);
         question.labels = question.key.flatMap(y => y.label);
        // console.log(question.labels);
         nColors = question.data.length;
         colors.push('rgb(36, 255, 101)');
         colors.push('rgb(43, 49, 255)');
         colors.push('rgb(255, 37, 30)');
         colors.push('rgb(255, 223, 39)');
         colors.push('rgb(204,43,255)');
         
         for(let i =0; i<= nColors; i++) {
             colors.push('rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')');
         }
    var ctx = document.getElementById("myChart"+ index).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: question.labels,
            datasets: [{
                label: '# of Votes',
                data: question.data,
                backgroundColor: colors,
                borderColor: colors, 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        } 
    }); 


    });



    $('.buton').click(function(){
         
         let index = $(this).val();

          var data_type = 'data:application/vnd.ms-excel';
          var a = document.createElement('a');
          var data_type = 'data:application/vnd.ms-excel';
          var table_div = document.getElementById('tabla-'+index);   
          var table_html = table_div.outerHTML.replace(/ /g, '%20');
          a.href = data_type + ', ' + table_html;
          //setting the file name
          a.download = 'exported_table.xls';
          //triggering the function
          a.click();

    });
 });


</script>



@endpush
