@extends('layouts.master')
@section('title', 'Crear Encuesta')

@include('includes.header')

@section('content')
        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Creación de encuesta</h1>
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
                                <li><a href="{{ URL('/encuestas')}}" class="text-dark-gray">Creación de encuesta</a></li>
                                <li class="text-dark-gray">{{$template->name}}</li>
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
                        <h5 class="font-weight-700 text-extra-dark-gray">{{$template->name}}</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- end form section -->
    {{--<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" align="center">
        <label>Logo</label>
        <input type="file" name="surveyLogo" id="surveyLogo">
        </div>
    </div> --}}
    
   {{-- <div id="app">--}}  

    <div id="app">
      @if($question === null)
        <app-survey-builder :template="{{ $template }}" >
        </app-survey-builder>
      @else
        <app-survey-builder :template="{{$template }}" :initial-elements='{{ json_encode($question->content) }}' >
        </app-survey-builder>
      @endif
    </div>
@endsection

{{-- @push('script')

<script>
    $(document).ready(function(){

    document.getElementById('guardar').addEventListener('click', function() {
      swal({
          position: 'center',
          title: 'Encuesta creada correctamente.<br>Se ha enviado para aprobación<br>de la misma.',
          type: 'success'
      }).then(function() {
          window.location = "{{url('mis_encuestas')}}";
      });
    });

    });

</script>

@endpush --}}

