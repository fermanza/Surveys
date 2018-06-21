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
                                <li><a href="index.php" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
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


             @foreach($answersGrouped as $answer)

                @if($answer['user']->username == null)
                    <hr>
                     <b> Usuario: </b> Anonimo 
                     <hr>     
                @else    
                   <b> Usuario: </b>  {{ $answer['user']->username }}    
                   <hr>
                @endif    

                  

                  @foreach($answer['questions'] as $questions)
<<<<<<< HEAD
                          <b>Pregunta: </b>    {{ $questions['question']->label }} 
=======
                         <b> Pregunta: </b>    {{ $questions['question']->label }} 
>>>>>>> 2915446781951d0e8a914a63cf8326f1bbb77bad
                            <br>
                          <b> Respuesta: </b>    {{$questions['answer']['value'] }}
                          <br>
                          <br>
                          
                  @endforeach
             @endforeach

                    </div>
                </div>
                <div class="col-md-12" align="center">
                     <a class="btn btn-default" href="{{ URL('mis_encuestas') }}">@lang('answer.regresar')</a>
                  </div>
            </div>
        </section>
@stop