
@extends('admin.default')

@section('page-header')
    <big>{{ trans('Encuestas') }}</big>
@endsection

@section('content')

<div class="container">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable">

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
                        <th>@lang('mis_encuestas.opciones')</th>
                    </tr>
                </thead>

                <tfoot>

                </tfoot>

                <tbody align="center">
                                @foreach($templates as $template)
                                <tr>
                                    <td> <a href="{{ URL('encuestas/responder') }}/{{ $template->id }} ">{{ $template->name }} </a></td>
                                    <td>{{ $template->created_at->diffForHumans() }}</td>
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
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                            {!! Form::open([
                                                    'class'=>'delete',
                                                    'url'  => route('mis_encuestas.destroy', $template),
                                                    'method' => 'DELETE',
                                                    ])
                                                !!}
                                                <br>
                                                &nbsp;&nbsp;<button title="Eliminar" class="btn btn-danger btn-sm" id="deleteTemp"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ URL('/encuestas/responder/') }}/{{ $template->id }}" title="{{ trans('Ver encuesta') }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="{{ URL('/mis_encuestas/approval') }}/{{ $template->id }}/1" title="{{ trans('Aprobar encuesta') }}" class="btn btn-success btn-sm"><span class="fa fa-check"></span></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <br />
                                                <a href="{{ URL('/mis_encuestas/approval') }}/{{ $template->id }}/0" title="{{ trans('Rechazar encuesta') }}" class="btn btn-danger btn-sm"><span class="fa fa-window-close"></span></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                </tbody>
        </table>
      </div>
    </div>
  </div>

@push('script')

<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
<script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>

    <script>
        $(document).ready(function() {
            @if(App::isLocale('es'))
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    bSort: false,
                    language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                    buttons: [
                        'csv', 'excel'
                    ]
                } );
            @else
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    bSort: false,
                    buttons: [
                        'csv', 'excel'
                    ]
                } );
            @endif
        } );
    </script>



@endpush

@endsection

