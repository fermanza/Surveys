<div class="row mB-40" align="center">
  <div class="col-sm-8">
    <div class="bgc-white p-20 bd" align="center">
      <div class="row">
                <form action="{{ route('admin.users.update', [$item]) }}" method="POST">
    {{ csrf_field() }}
     {{ method_field('PATCH') }}

    <div class="row">
        <div class="col-md-6">

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Nombre(s)')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required />
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name">@lang('Apellidos')</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $item->last_name }}" required />
                @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                @endif
            </div>
    </div>

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('Correo electrónico')</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}" required />
                @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">@lang('Dirección')</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $item->address }}" required />
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
                <input type="text" class="form-control" id="city" name="city" value="{{ $item->city }}" required />
                @if ($errors->has('city'))
                    <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country">@lang('País')</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $item->country }}" required />
                @if ($errors->has('country'))
                    <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                @endif
            </div>

        </div>
        <div class="col-md-6">
            
            <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                <label for="company">@lang('Empresa')</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $item->company }}" required/>
                @if ($errors->has('company'))
                    <span class="help-block"><strong>{{ $errors->first('company') }}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">@lang('Teléfono')</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $item->phone }}" required />
                @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                @endif
            </div>

        </div>
    </div>

    <hr />

    <div class="row">
       <div class="col-md-12">
          <h5 class="title text-extra-dark-gray">Editar contraseña</h5> 
    </div>
      

         <div class="col-md-6">

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">@lang('Nueva contraseña')</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $item->password }}" required />
                @if ($errors->has('password'))
                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>

        </div>

         <div class="col-md-6">

            <div class="form-group{{ $errors->has('password2') ? ' has-error' : '' }}">
                <label for="password2">@lang('Repetir contraseña')</label>
                <input type="password" class="form-control" id="password2" name="password2" value="{{ $item->password2 }}" required />
                @if ($errors->has('password2'))
                    <span class="help-block"><strong>{{ $errors->first('password2') }}</strong></span>
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
  </div>
</div>