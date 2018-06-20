@extends('layouts.master')
@section('title', 'Editar Mi Cuenta')

@extends('includes.header')
<? include 'includes/head.php' ?>
@section('content')
    @include('my_account.form')
@endsection