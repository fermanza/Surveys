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
                            <h1 class="no-margin-bottom">@lang('registro.editarCuenta')</h1>
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
                                <li class="text-dark-gray"><a href="mi-cuenta.php">@lang('registro.miCuenta')</a></li>
                                <li class="text-dark-gray">@lang('registro.datosPersonales')</li>
                                <li class="text-dark-gray">@lang('registro.editarCuenta')</li>
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
                    <h5 class="title text-extra-dark-gray">@lang('registro.editarCuenta')</h5> 
                </div>
                <div class="row">
                <form action="{{ route('my_account.update', [$user]) }}" method="POST">
                {{ csrf_field() }}
                 {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-md-6">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('registro.nombre')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required />
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name">@lang('registro.apellido')</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required />
                @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                @endif
            </div>
    </div>

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required />
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">@lang('registro.direccion')</label>
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
                <label for="city">@lang('registro.ciudad')</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required />
                @if ($errors->has('city'))
                    <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country">@lang('registro.pais')</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}" required />
                @if ($errors->has('country'))
                    <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                @endif
            </div>

        </div>
        <div class="col-md-6">
            
            <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                <label for="company">@lang('registro.empresa')</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $user->company }}" required/>
                @if ($errors->has('company'))
                    <span class="help-block"><strong>{{ $errors->first('company') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">@lang('registro.telefono')</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required />
                @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                @endif
            </div>

        </div>
    </div>

    <div class="row">
        <h5 class="title text-extra-dark-gray">@lang('registro.editarContra')</h5> 

         <div class="col-md-3">

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">@lang('registro.contra')</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" required />
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>

        </div>

         <div class="col-md-3">

            <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
                <label for="password2">@lang('registro.repetir')  @lang('registro.contra') </label>
                <input type="password" class="form-control" id="password2" name="password2" value="{{ $user->password2 }}" required />
                @if ($errors->has('password2'))
                    <span class="help-block"><strong>{{ $errors->first('password2') }}</strong></span>
                @endif
            </div>

        </div>
    </div>


    <hr />
    

    <div class="container">
            <div class="row">
              <div class="col-md-12" align="center">
                <br>
                                   <a href="{{ URL('my_account') }}" class="btn">@lang('registro.cancelar')</a><br><br>
                                    <button class="btn">@lang('registro.guardar')</button><br><br><br>
                  </div>
            </div>
        </div>

</form>

                </div>
            </div>
        </section>
@stop