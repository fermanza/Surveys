@extends('layouts.master')
@section('title', 'Crear Encuesta')

@extends('includes.header')
@section('content')


        <!-- start page title section -->
        <section class="bread wow fadeIn padding-25px-tb margin-bread">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="no-margin-bottom">@lang('crear_encuesta.creacionEncuesta')</h1>
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
                                <li class="text-dark-gray">@lang('crear_encuesta.creacionEncuesta')</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->
        
        <!-- start form section -->
        <section class="wow fadeIn registro-form login-form" id="start-your-project">
            <div class="container">
                <div class="row">
                @if(isset($_GET['error']))
                    @if($_GET['error']==1)
                    <div class="alert alert-danger">
                       @lang('crear_encuesta.noTienesCreditos')
                    </div>
                    @endif
                @endif

                    <div class="col-lg-12 col-md-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="font-weight-700 text-extra-dark-gray">@lang('crear_encuesta.comoQuieresComenzar')</h5>
                    </div>


            <div class="container tab-style2">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- start tab navigation -->
                        <ul class="nav nav-tabs display-inherit text-center">
                            <li class="active"><a href="#tab_sec1" data-toggle="tab"><i class="fa fa-edit"></i>@lang('crear_encuesta.crearEncuesta')</a></li>
                            <li><a href="#tab_sec2" data-toggle="tab"><i class="fa fa-copy"></i>@lang('crear_encuesta.copiarEncuesta')</a></li>
                        </ul>
                        <!-- end tab navigation -->
                    </div>
                </div>

                <div class="tab-content">
                    <!-- start tab content -->
                    <div class="tab-pane med-text fade in active" id="tab_sec1">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <h6 class="text-extra-dark-gray margin-20px-bottom">@lang('crear_encuesta.nombrarEncuesta')</h6>

                                    <form action="{{ URL('encuestas/storeTemplate') }}" method="POST" id="usrform">
                                        {{ csrf_field() }}
                                        {{ $action == 'edit' ? method_field('PATCH') : '' }}

                                        @foreach($users as $user)
                                        <input type="hidden" name="userName" class="form-control" value="{{ $user->name }}">
                                        <input type="hidden" name="email" class="form-control" value="{{ $user->email }}">
                                        <input type="hidden" name="user_id" class="form-control" value="{{ $user->id }}">
                                        @endforeach
            
                                        <div class="row" align="center">
                                            <div class="col-md-4">
                                                <input type="text" name="name" id="name" placeholder="@lang('crear_encuesta.nombrarEncuesta')" class="big-input" required>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="select-style big-select">
                                                    <select name="plan" id="plan" class="bg-transparent no-margin-bottom" required>
                                                        <option value="">@lang('crear_encuesta.tipoPlanEncuesta')</option>
                                                        <option value="0">@lang('crear_encuesta.gratis')</option>
                                                        <option value="1">Premium</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="select-style big-select">
                                                    <select name="tipo" id="tipo" class="bg-transparent no-margin-bottom" required>
                                                        <option value="">@lang('crear_encuesta.tipoDeEncuesta')</option>
                                                        <option value="0">@lang('crear_encuesta.publica')</option>
                                                        <option value="1">@lang('crear_encuesta.privada')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-large margin-20px-top">@lang('crear_encuesta.crearEncuesta')</button>
                                            </div>
                                            
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                    <!-- start tab content -->
                    <div class="tab-pane fade in" id="tab_sec2">
                        <div class="row equalize">
                            <div class="col-md-12 col-sm-12 col-xs-12 display-table">
                                <div class="display-table-cell vertical-align-middle">
                                    <h6 class="text-extra-dark-gray margin-20px-bottom">@lang('crear_encuesta.nombrarEncuesta')</h6>
                                    <form action="{{ URL('/copyTemplate') }}" method="POST" id="usrform">
                                        <div class="row" align="center">
                                            <div class="col-md-6"">
                                                <input type="text" name="name" id="name" placeholder="Nombrar la encuesta" class="big-input" required>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select-style big-select">
                                                    <select name="encuesta" id="plan" class="bg-transparent no-margin-bottom" required>
                                                       <option value="">@lang('crear_encuesta.copiarEncuesta')</option>
                                                       @foreach($templates as $template)   
                                                         <option value="{{ $template->id }}">{{ $template->name }}</option>
                                                       @endforeach  
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-large margin-20px-top">@lang('crear_encuesta.crearEncuesta')</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>       
            </div>
        </div>
    </div>
</section>
@stop