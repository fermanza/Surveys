@extends('layouts.master')
@section('title', 'Artículos')
@extends('includes.header')
@section('content')

<style>
.labels
{
    color: black;
    text-transform: uppercase;
}
.contenido
{
    font-size: 16px;
    color: #000;
    margin-bottom: 30px;
}
    
</style>

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
		
		<h6 class="labels" align="center">{{ $articulo->title }}</h6>
        <p class="labels" align="left">Fecha: {{ Carbon\Carbon::parse($articulo->created_at)->format('d-m-Y') }}</p>
        <p class="labels" align="left">Autor: {{ $articulo->user->name }}</p>
        <div align="center">
        <hr />
		<img src="{{URL($articulo->img)}}" style="width: auto !important; height: auto !important; max-width: 60%;">
		<br><br><br>
        {!! $articulo->body !!}
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