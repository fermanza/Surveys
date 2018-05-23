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
		<label>Titulo</label>
		<input type="text" name="title" value="{{ $articulo->title }}">
		<div id="blog">	
		</div>


		<div>
		 <img src="{{$articulo->img}}" style="width: 950px; height: 450px;">
		</div> 

		<label>Subir imagen</label>
		<input type="file" name="img">
		 <br> 	
		<button class="btn btn-primary" type="submit">Guardar</button>
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


