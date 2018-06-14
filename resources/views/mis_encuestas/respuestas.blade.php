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
                   
                    @foreach($questions as $ques)

                    {{--  @if($ques->type == "textarea" || $ques->type == "text" || $ques->type == "starRating" || $ques->type == "slider") --}}


                     {{-- @endif --}}

                         @foreach($answers as $answer)
                             @php  
                             $ans = json_decode($answer->answer); 

                             dd($ans, $questions);

                            @endphp 

                                @if($ques->type=="file")
                                    <div class="col-md-12" align="center">
                                     <img src="{{ URL($template->url) }}" style="width: 125px; height:100px;"><br><br>
                                     <h5>{{ $template->name }}</h5>
                                     </div>
                                @endif



                               @if($ques->label == "Texto") 
                                    @continue
                               @endif

                                @if($ques->label == "Imagen")
                                  @continue
                                @endif   

                                  <h5>Pregunta: {{$ques->label}}</h5>

                                  @foreach($ans as $a)

                                    @if($ques->label != "Texto")

                                

                                      @if($a->name == $ques->name )
                                         {{ $a->value }}
                                       @endif
                                    @endif   

                                  @endforeach


                           @endforeach 
                    @endforeach 


                    </div>

                </div>
            </div>
        </section>
@stop