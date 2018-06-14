@extends('layouts.master')
@section('title', 'Mis encuestas')

@extends('includes.header')
@section('content')

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
                    <?php $cont=0 ?>
                    @foreach($questions as $question)
                             @if($ans->type=="file")
                                <div class="col-md-12" align="center">
                                 <img src="{{ URL($template->url) }}" style="width: 125px; height:100px;"><br><br>
                                 <h5>{{ $template->name }}</h5>
                                 </div>
                            @endif

                           @if($ans->label!="Imagen") 
                            <h5>Pregunta: {{$pregunta->label}}</h5>
                           @endif
                           @foreach($answers as $ans)
                            
                            <?php $respuestajson=json_decode($ans->answer)?>

                            @php dd($respuestajson); @endphp
                            
                           

                             <?php $cont=$cont+1 ?>
                            
                           @endforeach
                    @endforeach


                    </div>

                </div>
            </div>
        </section>
@stop