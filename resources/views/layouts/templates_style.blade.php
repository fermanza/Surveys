<style>
@foreach($templates_style as $ts)
.survey-questions-container-{{$ts->name}} {
    width: 90% !important;
    margin: 0 auto;
    min-height: 325px;
    background: white;
    color: {{ $ts->font_color }};
    font-family: {{ $ts->font_type }};
    @if( strtolower($ts->name) == "blue")
        font-size: 18px;
    @endif
}
.survey-questions-container-{{$ts->name}} .font-color-data {
    font-family: {{ $ts->font_type }};
    @if( strtolower($ts->name) == "gray")
        color: {{ $ts->font_color }};
        font-size: 14px;
    @endif
}
.survey-questions-{{$ts->name}} {
    flex: 1;
    min-height: 375px;
    max-width: 90%;
    margin: 0 auto;
    background-image: url("{{ url($ts->background)}}");
    background-size: cover;
    padding-top: 25px;
    padding-bottom: 25px;
    padding-left: 20px;
    padding-right: 20px;
}

.survey-questions-{{$ts->name}} .double-border {
    border-bottom: {{$ts->border_bottom}}     
}

.survey-questions-{{$ts->name}} .background-gray {
@if( strtolower($ts->name) == "abstract")
    background: #fafafa !important;     
    border-bottom: none !important;
@endif
    display: block !important;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.survey-questions-{{$ts->name}} .border-radius-input {
    border-radius: {{ $ts->border_radius }};
}

.survey-questions-{{$ts->name}} .paddings {
    padding-top: 23px;
    padding-bottom: 16px;
}

.survey-questions-{{$ts->name}} .survey-questions-action-button {
    color: {{ $ts->icon_color }} !important;
    font-size: 20px;
    padding-top: 10px;
}
.survey-questions-{{$ts->name}} .survey-questions-action-button-margin {
    color: {{ $ts->icon_color }} !important;
    padding-top: 10px;
    font-size: 20px;
    padding-right: 15px;
}
.bar-container-{{$ts->name}} {
    width: 90% !important;
    margin: 0 auto;
    min-height: 50px;
    padding: 10px;
    background: {{ $ts->bar_color }};
}
.questions-data-container{
    margin-right: 15px;
    margin-left: 15px;
    margin-top: 10px;
    margin-bottom: 10px;
}
@media (max-width: 767px){
    .survey-questions-{{$ts->name}} {
        flex: 1;
        min-height: 375px;
        max-width: 95%;
        margin: 0 auto;
        background-image: url("{{url($ts->background)}}");
        background-size: cover;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .survey-questions-container-{{$ts->name}} .font-color-data {
        font-family: {{ $ts->font_type }};
        @if( strtolower($ts->name) == "gray")
            color: {{ $ts->font_color }};
            font-size: 12px;
        @endif
    }
    .survey-questions-container-{{$ts->name}} {
        width: 95% !important;
        margin: 0 auto;
        min-height: 325px;
        background: white;
        @if( strtolower($ts->name) == "blue")
            font-size: 18px;
        @endif
    }
    .bar-container-{{$ts->name}} {
        width: 95% !important;
        margin: 0 auto;
        min-height: 50px;
        padding: 5px;
        background: {{ $ts->bar_color }};
    }
    .survey-questions-{{$ts->name}} .double-border {
        border-bottom: {{$ts->border_bottom}}     
    }

    .survey-questions-{{$ts->name}} .background-gray {
    @if( strtolower($ts->name) == "abstract")
        background: #fafafa !important;     
        border-bottom: none !important;
    @endif
        display: block !important;
        padding-left: 15px;
        padding-right: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .survey-questions-{{$ts->name}} .border-radius-input {
        border-radius: {{ $ts->border_radius }}
    }

    .survey-questions-{{$ts->name}} .paddings {
        padding-top: 23px;
        padding-bottom: 16px;
    }

    .survey-questions-{{$ts->name}} .survey-questions-action-button {
        color: {{ $ts->icon_color }} !important;
        font-size: 20px;
    }
    .survey-questions-{{$ts->name}} .survey-questions-action-button-margin {
        color: {{ $ts->icon_color }} !important;
        font-size: 20px;
        padding-right: 15px;
    }
}
@endforeach
</style>