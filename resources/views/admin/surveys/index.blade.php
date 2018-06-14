
@extends('admin.default')

@section('page-header')
    <big>{{ trans('Encuestas') }}</big>
@endsection

@section('content')
{{-- 
<div class="mB-20">
    <a href="{{ route(ADMIN . '.users.create') }}" class="btn btn-info">
        {{ trans('Agregar Usuario') }}
    </a>
</div> --}}

<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="display nowrap" style="width:100%">
            
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
                        <th>@lang('mis_encuestas.eliminar')</th>
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
            $('#dataTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ]


            } );
        } );
    </script>



@endpush

@endsection

