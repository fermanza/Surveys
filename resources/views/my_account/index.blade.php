@extends('layouts.master')
@section('title', 'Mi Cuenta')

@extends('includes.header')
@section('content')

        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('mi_cuenta.miCuenta') </h1>
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
                                <li class="text-dark-gray"><a href="mi-cuenta.php">@lang('mi_cuenta.miCuenta')</a></li>
                                <li class="text-dark-gray">@lang('mi_cuenta.datosPersonales')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <section class="cuenta">

            <div class="container">
                <div class="row">
                    <h5 class="title text-extra-dark-gray">@lang('mi_cuenta.detalleCuenta')</h5> 
                </div>
                <div class="row">
                    <div class="col-md-12 tipo-p1">
                        <div>
                            <img src="{{ asset('images/mi-cuenta/i1.png') }}" alt="">
                            <div>
                                <p><b>@lang('mi_cuenta.tipoPlan')</b></p>
                                <p>@if($total>0)
                                    Premium
                                    @else
                                    @lang('mi_cuenta.gratis')
                                    @endif</p>
                            </div>
                        </div>
                        <a href="{{ URL('creditos') }}"><i class="fa fa-caret-right"></i> @lang('mi_cuenta.ampliar')</a>
                    </div>
                </div>
                <section class="tabla">
                 <table id="table-mi-cuenta">
                            <thead>
                                <tr>
                                    <th> @lang('mi_cuenta.nombre')</th>
                                    <th> @lang('mi_cuenta.apellido')</th>
                                    <th> @lang('mi_cuenta.empresa')</th>
                                    <th>E-mail</th>
                                    <th>@lang('mi_cuenta.direccion')</th>
                                    <th>@lang('mi_cuenta.telefono')</th>
                                    <th>@lang('mi_cuenta.ciudad')</th>
                                    <th>@lang('mi_cuenta.pais')</th>
                                    <th>Plan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->company }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->country }}</td>
                                    @if($total>0)
                                    <td>Premium</td>
                                    @else
                                    <td>@lang('mi_cuenta.gratis')</td>
                                    @endif
                                    <td><a href="{{ route('my_account.edit', [$user]) }}">
                                    <i class="fa fa-edit"></i>
                                    </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
            </div>
        </section>

        @push('script')
        <script>

    $(document).ready( function () {
        @if(App::isLocale('es'))
            $('#table-mi-cuenta').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                 },
                 responsive: true
            });
        @else 
           $('#table-mi-cuenta').DataTable({
            responsive: true
           }); 
        @endif   
    }); 


    </script>

        @endpush
 
@stop