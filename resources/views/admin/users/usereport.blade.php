
@extends('admin.default')

@section('page-header')
    Informaci&oacute;n de <big>{{ trans('Reportes de Uso') }}</big>
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable">

                <thead align="center">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de Créditos</th>
                        <th>Créditos Usados</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tfoot align="center">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de Créditos</th>
                        <th>Créditos Usados</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>

                <tbody align="center">
                    @foreach ($users as $user)
                        <tr>
                            <td><a href="{{ route(ADMIN . '.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->totalCredits }}</td>
                            <td>{{ $user->discount }}</td>
                            <td>{{ $user->updatedAt->created_at }}</td>
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
                    buttons: [
                        'csv', 'excel'
                    ]
                } );
            @endif
        } );
    </script>

@endpush

@endsection

