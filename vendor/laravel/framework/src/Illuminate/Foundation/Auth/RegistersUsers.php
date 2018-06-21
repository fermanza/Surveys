<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;


trait RegistersUsers
{
    use RedirectsUsers;
    use Notifiable;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //$this->validator($request->all())->validate();

        if (User::where('email', '=', Input::get('email'))->exists()){

            flash('<br><h6>El correo que ingresaste ya ha sido utilizado. <br>Intenta utilizando otro.</h6>')->error()->important();

            return view('registro');
        }
        else{
            event(new Registered($user = $this->create($request->all())));
            
            $user->notify(new UserNotification($user));

            flash('<br><h6>Usuario creado correctamente. <br>Te hemos enviado un correo electrónico para tu confirmación.</h6>')->success();

            return view('registro');
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
