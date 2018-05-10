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
                            <h1 class="no-margin-bottom">Mi cuenta</h1>
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
                                <li class="text-dark-gray"><a href="mi-cuenta.php">Mi cuenta</a></li>
                                <li class="text-dark-gray">Datos personales</li>
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
                    <h5 class="title text-extra-dark-gray">Detalle de la cuenta</h5> 
                </div>
                <div class="row">
                    <div class="col-md-12 tipo-p1">
                        <div>
                            <img src="{{ asset('images/mi-cuenta/i1.png') }}" alt="">
                            <div>
                                <p><b>Tipo de plan</b></p>
                                <p>GRATUITO (cuenta básica)</p>
                            </div>
                        </div>
                        <a href="{{ URL('creditos') }}"><i class="fa fa-caret-right"></i> Ampliar</a>
                    </div>
                </div>
                <section class="tabla">
                 <table id="table-mi-cuenta">
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($my_accounts as $my_account)
                                <tr>
                                    <td>{{ $my_account->name }}</td>
                                    <td>{{ $my_account->last_name }}</td>
                                    <td>{{ $my_account->company }}</td>
                                    <td>{{ $my_account->email }}</td>
                                    <td>{{ $my_account->address }}</td>
                                    <td>{{ $my_account->phone }}</td>
                                    <td>{{ $my_account->city }}</td>
                                    <td>{{ $my_account->country }}</td>
                                    <td><a href="">
                                    <i class="fa fa-edit"></i>
                                    </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
            </div>
        </section>
@stop