<style>
@foreach($templates_style as $ts)
.survey-questions-container-{{$ts->name}} {
    width: 90% !important;
    margin: 0 auto;
    min-height: 325px;
    background: white;
    padding: 15px;
    color: {{ $ts->font_color }};
    font-family: {{ $ts->font_type }};
}
.survey-questions-{{$ts->name}} {
    flex: 1;
    min-height: 375px;
    max-width: 90%;
    margin: 0 auto;
    background-image: url("{{ $ts->background }}");
    background-size: cover;
    padding-top: 25px;
    padding-bottom: 25px;
    padding-left: 20px;
    padding-right: 20px;
}
.bar-container-{{$ts->name}} {
    width: 90% !important;
    margin: 0 auto;
    min-height: 50px;
    padding: 10px;
    background: {{ $ts->bar_color }};
}
@media (max-width: 767px){
    .survey-questions-{{$ts->name}} {
        flex: 1;
        min-height: 375px;
        max-width: 95%;
        margin: 0 auto;
        background-image: url("{{ $ts->background }}");
        background-size: cover;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .survey-questions-container-{{$ts->name}} {
        width: 95% !important;
        margin: 0 auto;
        min-height: 325px;
        background: white;
        padding: 5px;
    }
	.bar-container-{{$ts->name}} {
	    width: 95% !important;
	    margin: 0 auto;
	    min-height: 50px;
	    padding: 5px;
	    background: {{ $ts->bar_color }};
	}
}
@endforeach
</style>