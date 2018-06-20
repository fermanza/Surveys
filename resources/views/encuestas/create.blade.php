@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.header')
<? include 'includes/head.php' ?>
@section('content')
    @include('encuestas.form')
@endsection