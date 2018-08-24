@extends('layouts.master')
@section('title', 'Artículos')

@extends('includes.header')
@section('content')



<input style="display: none;" type="text" id="content" value="{{ $articulo->body }}">


<section class="padding-25px-tb margin-bread">
	<div class="container">

    
     <form method="POST" action="{{route('articulos.update', $articulo->id)}}" enctype="multipart/form-data">	
     	{{ method_field('PATCH')}}
     	 @csrf
		<label>@lang('articulos.titulo')</label>
		<input type="text" name="title" value="{{ $articulo->title }}">
		<div align="center">
		 <img src="{{URL($articulo->img)}}" style="width: auto !important; height: auto !important; max-width: 60%;">
		</div> 
		<br>
		<label>@lang('articulos.subirImagen')</label>
		<input type="file" name="img">
		<div id="blog">	
		</div>
		 <br> 	
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

  	let content = $('#content').val();
  	$('#blog').trumbowyg('html', content);




  });	

</script>



@endpush


