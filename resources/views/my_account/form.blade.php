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
                            <h1 class="no-margin-bottom">Editar cuenta</h1>
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
                                <li class="text-dark-gray">Editar cuenta</li>
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
                    <h5 class="title text-extra-dark-gray">Editar cuenta</h5> 
                </div>
                <div class="row">
                <form action="{{ route('my_account.update', [$user]) }}" method="POST">
    {{ csrf_field() }}
     {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-md-6">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Nombre(s)')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required />
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name">@lang('Apellidos')</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required />
                @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                @endif
            </div>
    </div>

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('Correo electrónico')</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required />
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">@lang('Dirección')</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required />
                @if ($errors->has('address'))
                    <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
                @endif
            </div>

    </div>
</div>

  <div class="row">
        <div class="col-md-6">

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city">@lang('Ciudad')</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required />
                @if ($errors->has('city'))
                    <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country">@lang('País')</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" required />
                @if ($errors->has('country'))
                    <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                @endif
            </div>

        </div>
        <div class="col-md-6">
            
            <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                <label for="company">@lang('Empresa')</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $user->company }}" required/>
                @if ($errors->has('company'))
                    <span class="help-block"><strong>{{ $errors->first('company') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">@lang('Teléfono')</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required />
                @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                @endif
            </div>

        </div>
    </div>

    <hr />
    
    <div class="row">
        <div class="guardar">
        <div class="col-md-12 text-center">
            <a href="{{ url()->previous() }}" class="btn">Cancelar</a>
            <button class="btn">Guardar</button>
        </div>
    </div>
    </div>
</form>

                </div>
            </div>
        </section>
@stop