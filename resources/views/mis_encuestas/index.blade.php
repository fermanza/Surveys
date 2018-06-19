@extends('layouts.master')
@section('title', 'Mis encuestas')

@extends('includes.header')
@section('content')

<style>
.swal2-container
{
    z-index:9999;
}
</style>



        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('mis_encuestas.misEncuestas')</h1>
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
                                <li class="text-dark-gray">@lang('mis_encuestas.misEncuestas')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->

        <section class="tabla">
            <div class="container">
                <div class="col-md-12">
                    {{-- <div class="select-style big-select">

                    </div> --}}
                    <a class="btn" a href="{{ URL('encuestas') }}">@lang('mis_encuestas.crearEncuesta')</a><br><br><br>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">


                        <table id="table-mis-encuestas">
                            <thead>
                                <tr>
                                    <th>@lang('mis_encuestas.titulo')</th>
                                    <th>@lang('mis_encuestas.fechaCreacion')</th>
                                    <th>@lang('mis_encuestas.tipoDeEncuesta')</th>
                                    <th>@lang('mis_encuestas.tipoDePlan')</th>
                                    <th>@lang('mis_encuestas.respuestas')</th>
                                    <th>@lang('mis_encuestas.reportes')</th>
                                    <th>@lang('mis_encuestas.cerrarEncuesta')</th>
                                    <th>@lang('mis_encuestas.editarEncuesta')</th>
                                    <th>@lang('mis_encuestas.compartir')</th>
                                    <th>@lang('mis_encuestas.eliminar')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($templates as $template)
                                <tr>
                                    <td> <a href="{{ URL('encuestas/responder') }}/{{ $template->id }} ">{{ $template->name }} </a></td>
                                    <td>{{ $template->created_at }}</td>
                                    @if($template->type==0)
                                    <td>@lang('mis_encuestas.publica')</td>
                                    @else
                                    <td>@lang('mis_encuestas.privada')</td>
                                    @endif

                                    @if($template->plan==0)
                                    <td>@lang('mis_encuestas.gratis')</td>
                                    @else
                                    <td>Premium</td>
                                    @endif



                                    <td> {{ $template->answersnumber }} </td>
                                    <td><a href="{{url('mis_encuestas/respuestas')}}/{{$template->id}}"><i class="fa fa-file"></i></a></td>
                                    <td><a href=""><i class="fa fa-times"></i></a></td>
                                    <td><a href="{{ route('mis_encuestas.edit', [$template]) }}">
                                    <i class="fa fa-edit"></i>
                                    </a></td>
                                    <td>
                                    <a href="#" onClick="getLink({{$template->id}})"><i class="fa fa-share-square"></i></a>
                                    </td>
                                    <td> {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route('mis_encuestas.destroy', $template), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}
                                            <br>
                                            <button title="Eliminar"  id="deleteTemp"><i class="fa fa-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>

        @push('script')
        <script>

    $(document).ready( function () {
        @if(App::isLocale('es'))
            $('#table-mis-encuestas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                 },
                 "responsive": true,
                 "bSort": false
            });
        @else 
           $('#table-mis-encuestas').DataTable({
            responsive: true
           }); 
        @endif   
    }); 
 

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
  html:'<p>Puedes usar el siguiente link para compartir tu encuesta: </p>' +
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
        html: '¡Enlace copiado!'
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