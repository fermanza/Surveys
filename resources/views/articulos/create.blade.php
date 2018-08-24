@extends('layouts.master')
@section('title', 'Artículos')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('articulos.creacionArticulo')</h1>
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
                                <li class="text-dark-gray">@lang('articulos.creacionArticulo')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@include('flash::message')

<section class="padding-25px-tb margin-bread">
	<div class="container">
     <form method="post" action="{{route('articulos.store')}}" enctype="multipart/form-data">			
		<label>@lang('articulos.titulo')</label>
		<input type="text" name="title">

		<label>@lang('articulos.subirImagen')</label>
		<input type="file" name="img">
		<div id="blog">	
		</div>

		<div align="center">
		<a class="btn" href="{{ url()->previous() }}">@lang('articulos.cancelar')</a>
		<button class="btn btn-primary" type="submit">@lang('articulos.guardar')</button>
		</div>
	</form>	
	</div>

</section>




@push('script')


<script type="text/javascript">
	
  $(document).ready(function() {
  	$('#blog').trumbowyg();

  });	

</script>



@endpush



























