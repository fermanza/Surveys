@extends('layouts.master')
@section('title', 'Responder Encuesta')

@extends('includes.header')
@section('content')
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div id="app">
    <app-survey :elements="{{ '[{"uid":"eabacf97b10b5c534820660016bbc84a","type":"text","title":"Texto","className":"fa-font","config":{"title":"Texto"},"answer":""},{"uid":"d85eae20d93d97eb895c1a46e6914366","type":"textarea","title":"Comentarios","className":"fa-comments","config":{"title":"Comentarios"},"answer":""},{"uid":"f074f4602a4783c487d7304299610bec","type":"header","title":"Parrafo","className":"fa-heading","config":{"title":"Parrafo"},"answer":""}]' }}"></app-survey>
  </div>
@endsection
