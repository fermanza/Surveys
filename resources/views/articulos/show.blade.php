@extends('layouts.master')
@section('title', 'Artículos')
@extends('includes.header')
@section('content')



<div class="container">		

	<section class="padding-25px-tb margin-bread">
		
		<h2>{{ $articulo->title }}</h2>
		<img src="{{$articulo->img}}" style="width: 950px; height: 450px;">

		<br>
		<p style="color: black"> {!! $articulo->body !!} </p>
	</section>


	<button id="back" class="btn btn-primary"> Regresar </button>
</div>
	


@push('script')
<script type="text/javascript">
	$('#back').click(function(){
		window.history.back();
	});
</script>
@endpush