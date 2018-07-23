@extends('layouts.master')
@section('title', 'Crear Encuesta')

@include('includes.header')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div id="app">
                <app-survey-builder></app-survey-builder>
            </div>
        </div>
    </div>
@endsection
