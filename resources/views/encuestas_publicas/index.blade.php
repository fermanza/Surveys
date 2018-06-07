@extends('layouts.master')
@section('title', 'Encuestas Públicas')

@extends('includes.header')

@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('encuestas_publicas.encuestasPublicas')</h1>
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
                                <li class="text-dark-gray"> @lang('encuestas_publicas.encuestasPublicas')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <!-- start post content section --> 
        <section>
            <div class="container">
                <div class="row">
                	<aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                        <div class="display-inline-block width-100 margin-30px-bottom xs-margin-25px-bottom temas">
                            <div class="temas-title">@lang('encuestas_publicas.reportes')</div>
                            
                                <div class="select-style big-select">
                                    <select name="budget" id="budget" class="bg-transparent no-margin-bottom">
                                         <option value="">@lang('encuestas_publicas.seleccionarTipoReporte')</option>
                                        <option value="1">Reporte Simple</option>
                                        <option value="2">Reporte Avanzado</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="select-style big-select">
                                    <select name="budget2" id="budget2" class="bg-transparent no-margin-bottom">
                                         <option value="">@lang('encuestas_publicas.seleccionarCategoria')</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="buscar position-relative">
                                 <form method="GET" action= "{{ route('encuestas_publicas.index') }}" >   
                                    <input type="text" name="title" class="bg-transparent no-margin border-color-extra-light-gray medium-input pull-left" placeholder="@lang('encuestas_publicas.buscar')">
                                    <button type="submit" class="bg-transparent position-absolute right-0 top-8" style="border: none;"><i class="fa fa-search no-margin-left"></i></button>
                                 </form>   
                                </div>  
                            
                        </div>
                        <div class="margin-30px-bottom xs-margin-25px-bottom reg">
                            <div class="display-inline-block width-100">
                                <h6>@lang('encuestas_publicas.quieresCrearEncuesta')</h6>
                                <p>@lang('encuestas_publicas.suscribete')</p>
                                <form method="POST" action="{{ URL('register') }}">
                                    {{ csrf_field() }}
                                    <div class="row" align="center">
                                        <div class="col-md-12">
                                            <input type="text" name="name" id="name" placeholder="@lang('encuestas_publicas.nombre')">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="last_name" id="lastName">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="company" id="empresa">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="email" name="email" id="email" placeholder="E-mail">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="password" name="password" id="password" placeholder="@lang('encuestas_publicas.contra')">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="password_confirmation" id="password_confirmation">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="address" id="direccion">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="phone" id="telefono">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="city" id="ciudad">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="country" id="pais">
                                        </div>
                                        <div class="col-md-12" style="text-align:left;">
                                            <input type="checkbox" id="check" required>
                                            <label for="check" class="text-extra-dark-gray">@lang('encuestas_publicas.aceptoLos') <a href="{{ URL('terminos')}}">@lang('encuestas_publicas.terminos')</a></label>
                                        </div>
                                        <div class="col-md-12">
                                            {{-- <input type="button" name="ingresar" id="ingresar" value="Crear encuesta"> --}}
                                            <br><button type="submit" class="btn-success">@lang('encuestas_publicas.crearCuenta')</button><br><br>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-extra-dark-gray">@lang('encuestas_publicas.obtenerPotencia')<br><a href="{{ URL('planes')}}">@lang('encuestas_publicas.verPlanes')</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </aside>
                    <main class="col-md-9 col-sm-12 col-xs-12 sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                        <h3>@lang('encuestas_publicas.encuestasDestacadas')</h3>
                        <!-- start post item --> 
                        @foreach($templates as $template)
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-post-content xs-text-center">                        
                            <div class="blog-text display-inline-block width-100">
                                <div class="content">
                                    <div class="text-medium-gray text-extra-small margin-5px-bottom text-uppercase"><span>{{ $template->user->name }}</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span>{{ $template->created_at->diffForHumans() }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="#" onClick="getLink({{$template->id}})">@lang('encuestas_publicas.compartir')</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{ URL('plantillas') }}">@lang('encuestas_publicas.tiposEncuestas')</a></span></div>
                                    <a href="{{ URL('encuestas/responder') }}/{{ $template->id }}" class="text-extra-dark-gray text-uppercase text-large font-weight-600 margin-15px-bottom display-block">{{ $template->name }}</a>
                                    <p>{{ $template->description }}</p>
                                </div>
                                <div class="equalize xs-equalize-auto author display-table width-100">
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="{{url('mis_encuestas/respuestas')}}/{{$template->id}}" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-bar-chart margin-5px-right"></i>@lang('encuestas_publicas.reporteSimple')</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="/reporte_avanzado/{{$template->id}}" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-pie-chart margin-5px-right"></i>@lang('encuestas_publicas.reporteAvanzado')</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name col-md-4 col-sm-4">
                                        <div class="display-table text-center width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle">
                                                <a href="#" class="text-extra-small margin-lr-auto display-table"><i class="fa fa-file-o margin-5px-right"></i>@lang('encuestas_publicas.exportarReporte')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end post item -->
                        <div class="pag">
                            {{-- <p>Total de las encuestas: 4 de 17</p> --}}
                            <div align="left">
                                <a href="#">@lang('encuestas_publicas.anterior')</a>
                            </div>
                            <div align="right">
                                <a href="#">@lang('encuestas_publicas.siguiente')</a>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </section>
        <!-- end blog content section -->
        <section class="disclaimer">
            <div class="container">
            <p> <img src="images/encuestas/warning.png" alt="" width="40px" height="40px"> @lang('encuestas_publicas.surveniaNoValida')</p>
            </div>
        </section>

          @push('script')
        <script>
        function getLink(id)
        {

            request = $.ajax({
        url: '{{url('bitly')}}/'+id,
        type: "get"
    });

        request.done(function (response, textStatus, jqXHR){
            swal({
  title: '',
  type: 'success',
  html:'<p>Puedes usar el siguiente link para compartir tu encuesta</p>' +
    '<input id="txtshare" value="'+response+'" type="text" class="form-control">',
  showCloseButton: true,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-copy"></i> Copiar',
}).then((result) => {
    var copyText = document.getElementById("txtshare");
  copyText.select();
  document.execCommand("copy");

  swal({
        type: 'success',
        html: 'Enlace copiado'
      })
})
            
  });

  // Callback handler that will be called on failure
  request.fail(function (jqXHR, textStatus, errorThrown){
      
  });


            
        }

        
        </script>

        @endpush
@stop