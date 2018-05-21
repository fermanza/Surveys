@extends('admin.default')

@section('page-header')
    Información de <big>{{ trans('Usuarios') }}</big>
@endsection

@section('content')

<div class="mB-20">
    <a href="{{ route(ADMIN . '.users.create') }}" class="btn btn-info">
        {{ trans('Agregar Usuario') }}
    </a>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Empresa</th>
                        <th>E-mail</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>País</th>
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
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>País</th>
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
                                        <a href="{{ route(ADMIN . '.users.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>
                                    <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.users.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}

                                            <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                            
                                        {!! Form::close() !!}
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

@endsection