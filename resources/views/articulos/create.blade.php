@extends('layouts.master')
@section('title', 'Artículos')

@extends('includes.header')
@section('content')



<section class="padding-25px-tb margin-bread">
	<div class="container">
     <form method="post" action="{{route('articulos.store')}}" enctype="multipart/form-data">			
		<label>Titulo</label>
		<input type="text" name="title">
		<div id="blog">	
		</div>

		<label>Subir imagen</label>
		<input type="file" name="img">
		<button class="btn btn-primary" type="submit">Guardar</button>
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



























