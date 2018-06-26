@extends('layouts.master')
@section('title', 'Artículos')
@extends('includes.header')
@section('content')

     <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">Art&iacute;culos</h1>
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
                                <li><a href="{{ URL('articulos')}}" class="text-dark-gray">@lang('articulos.articulos')</a></li>
                                <li class="text-dark-gray">{{ $articulo->title }}</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

<div class="container">		

	<section class="padding-25px-tb margin-bread">
		
		<h5 align="center">Tema: {{ $articulo->title }}</h5>
        <h6 align="right">Fecha: {{ Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y') }}</h6>
        <h6 align="right">Autor: {{ $articulo->user->name }}</h6>
        <div align="center">
        <hr />
		<img src="{{URL($articulo->img)}}" style="width: auto !important; height: auto !important; max-width: 70%;">
		<br><br><br>
		<h6 style="color: black; text-align: justify;"> {!! $articulo->body !!} </h6>
        </div>
	<div align="center">
        <hr />
        <a class="btn" href="{{ URL('articulos') }}">Volver a Artículos</a>
        </div>

    </section>
</div>

	


@push('script')
<script type="text/javascript">
	$('#back').click(function(){
		window.history.back();
	});
</script>
@endpush