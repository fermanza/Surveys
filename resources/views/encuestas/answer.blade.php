@extends('layouts.master')
@section('title', 'Responder Encuesta')

@extends('includes.header')
@section('content')

<style scoped>
    .survey-questions {
        flex: 1;
        min-height: 450px;
        max-width: 90%;
        margin: 0 auto;
        background-image: url("{{ url($template_style->background) }}");
        background-size: cover;
        padding-top: 25px;
        padding-bottom: 25px;
        padding-left: 25px;
        padding-right: 25px;
    }
    .survey-questions-container {
        width: 90% !important;
        margin: 0 auto;
        min-height: 325px;
        background: white;
        padding-top: 15px;
        padding-bottom: 3px;
        color: {{ $template_style->font_color }};
        font-family: {{ $template_style->font_type }};
        @if( strtolower($template_style->name) == "blue")
            font-size: 18px;
        @endif
    }
    .survey-questions-container .font-color-data {
        font-family: {{ $template_style->font_type }};
        @if( strtolower($template_style->name) == "gray")
            color: {{ $template_style->font_color }};
            font-size: 14px;
        @endif
    }
    .bar-container {
        width: 90% !important;
        margin: 0 auto;
        min-height: 50px;
        padding: 15px;
        background: {{ $template_style->bar_color }};
    }
    .survey-questions .double-border {
        border-bottom: {{$template_style->border_bottom}}     
    }
    .survey-questions .background-gray {
    @if( strtolower($template_style->name) == "abstract")
        background: #fafafa !important;     
        border-bottom: none !important;
    @endif
        display: block !important;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .survey-questions .border-radius-input {
        border-radius: {{ $template_style->border_radius }}
    }

    .survey-questions .paddings {
        padding-top: 23px;
        padding-bottom: 16px;
    }

    .survey-questions .survey-questions-action-button {
        color: {{ $template_style->icon_color }} !important;
        font-size: 20px;
    }
    .questions-data-container{
        margin-right: 15px;
        margin-left: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    @media (max-width: 767px){
        .survey-questions {
            flex: 1;
            min-height: 375px;
            max-width: 95%;
            margin: 0 auto;
            background-image: url("{{ url($template_style->background) }}");
            background-size: cover;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .survey-questions-container .font-color-data {
            font-family: {{ $template_style->font_type }};
            @if( strtolower($template_style->name) == "gray")
                color: {{ $template_style->font_color }};
                font-size: 12px;
            @endif
        }
        .survey-questions-container {
            width: 95% !important;
            margin: 0 auto;
            min-height: 325px;
            background: white;
            color: {{ $template_style->font_color }};
            font-family: {{ $template_style->font_type }};
            padding-bottom: 3px;
            @if( strtolower($template_style->name) == "blue")
                font-size: 16px;
            @endif
        }
        .survey-questions .double-border {
            border-bottom: {{$template_style->border_bottom}}     
        }
        .bar-container {
            width: 95% !important;
            margin: 0 auto;
            min-height: 50px;
            padding: 15px;
            background: {{ $template_style->bar_color }};
        }
        .survey-questions .background-gray {
        @if( strtolower($template_style->name) == "abstract")
            background: #fafafa !important;     
            border-bottom: none !important;
        @endif
            display: block !important;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .survey-questions .border-radius-input {
            border-radius: {{ $template_style->border_radius }}
        }
        .survey-questions .paddings {
            padding-top: 23px;
            padding-bottom: 16px;
        }
        .survey-questions .survey-questions-action-button {
            color: {{ $template_style->icon_color }} !important;
            font-size: 20px;
        }
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
<br />
  <div id="app" >
    <div class="survey-questions">
        <div class="bar-container" align="center">
            @if($template->url != null)
              <img src="{{ URL($template->url) }}" style="width: 250px !important; height: auto !important; max-width: 20%;" />
            @endif
        </div>
        <div class="survey-questions-container" align="center">
          <h4>{{ $template->name }}</h4>
          <app-survey :template={{ $template->id }} :elements="{{ json_encode($question->content) }}"></app-survey>
      </div>
    </div>
  </div>
@endsection
