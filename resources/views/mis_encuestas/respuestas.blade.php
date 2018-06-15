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
                


            <div class="col-md-12" align="center">
             <img src="{{ URL($template->url) }}" style="width: 125px; height:100px;"><br><br>
             <h5>{{ $template->name }}</h5>
             </div>

   @foreach($questions as $ques)

        
              <h6>Pregunta: {{$ques->label}}</h6>
              @foreach($ques->respuestas as $resp)
                   {{ $resp }}
                   <br>

   @endforeach






              {{--    @if($ques->type == "textarea" || $ques->type == "text" || $ques->type == "starRating" || $ques->type == "slider") 
                      @endif 

                         @foreach($answers as $answer)
                             @php  
                             $ans = json_decode($answer->answer); 
                            @endphp 

                            
                               @if($ques->label == "Texto") 
                                    @continue
                               @endif

                                @if($ques->label == "Imagen")
                                  @continue
                                @endif   

                                  <h5>Pregunta: {{$ques->label}}</h5>

                                  @foreach($ans as $a)

                             @if($ques->label != "Texto")

                                 @if(strstr($a->name, 'select') && strstr($ques->name, 'select'))
                                      @foreach($ques->values as $v)

                                        @if($a->value == $v->value)
                                           {{ $a->value }}
                                        @endif
                                      @endforeach
                                   @endif  


                                    @if(strstr($a->name, 'sliders'))
                                      @php
                                        $resp = str_replace('sliderslider-', '', $a->name);
                                      @endphp
                                    @endif

                                    @if(strstr($ques->name, 'slider'))
                                      @php  
                                         $pregunta = str_replace('slider-', '', $ques->name);
                                      @endphp

                                      @if($resp == $pregunta)
                                         {{$a->value}}
                                      @endif   

                                    @endif
                                     

                                      @if($a->name == $ques->name )
                                         {{ $a->value }}
                                       @endif


                                @endif   

                                  @endforeach


                           @endforeach  --}}
@endforeach  


                    </div>

                </div>
            </div>
        </section>
@stop