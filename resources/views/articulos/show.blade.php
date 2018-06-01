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
		
		<h2>{{ $articulo->title }}</h2>
		<img src="{{$articulo->img}}" style="width: 950px; height: 450px;">

		<br>
		<p style="color: black"> {!! $articulo->body !!} </p>
	</section>


	<button id="back" class="btn btn-primary" align="center"> Regresar </button>

    <div class="guardar">
                                    <a href="{{ url()->previous() }}">Cancelar</a>
                            </div>
</div>
	


@push('script')
<script type="text/javascript">
	$('#back').click(function(){
		window.history.back();
	});
</script>
@endpush