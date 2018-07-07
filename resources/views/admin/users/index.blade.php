
@extends('admin.default')

@section('page-header')
    Informaci&oacute;n de <big>{{ trans('Usuarios') }}</big>
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
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Empresa</th>
                        <th>E-mail</th>
                        <th>Direcci&oacute;n</th>
                        <th>Tel&eacute;fono</th>
                        <th>Ciudad</th>
                        <th>Pa&iacute;s</th>
                        <th>Plan</th>
                        <th></th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Empresa</th>
                        <th>E-mail</th>
                        <th>Direcci&oacute;n</th>
                        <th>Tel&eacute;fono</th>
                        <th>Ciudad</th>
                        <th>Pa&iacute;s</th>
                        <th>Plan</th>
                        <th></th>
                    </tr>
                </tfoot>
             
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td><a href="{{ route(ADMIN . '.users.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->company }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->country }}</td>
                            @if($total>0)
                                    <td>Premium</td>
                                    @else
                                    <td>Gratuito</td>
                                    @endif</td>
                                 <td>   
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route(ADMIN . '.users.edit', $item->id) }}" title="{{ trans('Editar usuario') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                    <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.users.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}

                                            <button class="btn btn-danger btn-sm" title="{{ trans('Eliminar usuario') }}"><i class="ti-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ URL('admin/users/creditos', $item->id )}}" title="{{ trans('Agregar créditos') }}" class="btn btn-success btn-sm"><span class="ti-gift"></span></a></li>
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
            $('#dataTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],
                responsive: true
            } );
        } );
    </script>

@endpush

@endsection

