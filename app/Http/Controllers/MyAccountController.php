<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyAccount;
use App\User;
use Auth;
use DB;
class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $creditos=DB::table("user_credit")->where('user_id','=',$id)->sum('credits');
        $discounts=DB::table("discounts")->where('user_id','=',$id)->sum('credits');
        $total = $creditos-$discounts;

        return view('my_account.index',compact('user','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $view = 'my_account.edit';
        $id = Auth::id();
        $user = User::find($id);

        //dd($user);
        return $this->form($view, $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request->all());

        $id = Auth::id();
        $user = User::findOrNew($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->password2 = $request->password2;

        $user->save();

        return redirect()->route('my_account.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for the specified resource.
     *
     * @param  \App\User  $user
     * @param  string  $action
     * @param  string  $view
     * @return \Illuminate\Http\Response
     */
    protected function form($view, $user)
    {
        //dd($user);
        $id = Auth::id();
        $user = User::find($id);
//dd($user);
        return view($view, compact('user'));
    }
}
