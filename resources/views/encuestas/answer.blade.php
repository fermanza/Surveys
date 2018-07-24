@extends('layouts.master')
@section('title', 'Responder Encuesta')

@extends('includes.header')
@section('content')
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <div id="app" >
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" align="center">
          <h4>{{ $template->name }}</h4>
          <app-survey :template={{ $template->id }} :elements="{{ json_encode($question->content) }}"></app-survey>
      </div>
    </div>
  </div>
@endsection
