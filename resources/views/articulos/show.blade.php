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
                                <li><a href="index.php" class="text-dark-gray"><i class="fa fa-home"></i></a></li>
                                <li class="text-dark-gray">Art&iacute;culos</li>
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
        <h6 align="right">Fecha: {{ $articulo->created_at }}</h6>
        <h6 align="right">Autor: {{ $articulo->user->name }}</h6>
        <div align="center">
        <hr />
		<img src="{{URL($articulo->img)}}" style="width: 700px; height: 450px;">
		<br><br><br>
		<h5 style="color: black"> {!! $articulo->body !!} </h5>
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