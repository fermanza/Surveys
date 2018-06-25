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

        <!-- start page title section -->
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
                <h5>{{ $template->name }}</h5>
             </div>


<div class="col-md-12" align="center">
    <a href="{{ URL('mis_encuestas/excel')}}/{{$template->id}}" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-file-o margin-5px-right"></i>@lang('encuestas_publicas.exportarReporte')</a>
</div>



 <table id="table-mis-respuestas" class="display">
        <thead>
          @foreach($answersGrouped as $answer)
              <tr>
                <th>
                @if($answer['user']->username == null)
                     <b> Usuario: </b> Anonimo    
                @else   
                   <b> Usuario: </b>  {{ $answer['user']->username }}    
                @endif 
                </th>
              </tr>
              @foreach($answer['questions'] as $questions)
          <tr>
            <td>
              <br><b> Pregunta: </b>    {{ $questions['question']->label }}
              <br>
              <b> Respuesta: </b>    {{$questions['answer']['value'] }}<br><br>
            </td>
          </tr>
              @endforeach
            @endforeach
        </thead>
        <tbody>
        </tbody>
</table>


      {{--        @foreach($answersGrouped as $answer)

                @if($answer['user']->username == null)
                    <hr>
                     <b> Usuario: </b> Anonimo 
                     <hr>     
                @else    
                   <b> Usuario: </b>  {{ $answer['user']->username }}    
                   <hr>
                @endif    

                  

                  @foreach($answer['questions'] as $questions)
                         <b> Pregunta: </b>    {{ $questions['question']->label }} 
                            <br>
                          <b> Respuesta: </b>    {{$questions['answer']['value'] }}
                          <br>
                          <br>
                          
                  @endforeach
             @endforeach --}}

                    </div>
                </div>
                <div class="col-md-12" align="center">
                     <a class="btn btn-default" href="{{ url()->previous() }}">@lang('answer.regresar')</a>
                  </div>
            </div>
        </section>

    @push('script')

    <script type="text/javascript"> 
        $(document).ready(function() {


         $('.buton').click(function(){
         
          let index = $(this).val();

          var data_type = 'data:application/vnd.ms-excel';
          var a = document.createElement('a');
          var data_type = 'data:application/vnd.ms-excel';
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