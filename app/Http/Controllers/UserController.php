<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use App\UserCredit;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('updated_at')->get();
        $id = Auth::id();
        foreach($users as $user) {
            $creditosUser = DB::table("user_credit")->where('user_id' ,'=', $user->id)->sum('credits');
            $discountsUser = DB::table("discounts")->where('user_id' ,'=', $user->id)->sum('credits');
            $totalCreditsUser = $creditosUser - $discountsUser;
            $user->totalCredits = $totalCreditsUser;
        }

        return view('admin.users.index', compact('users','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, User::rules());

        User::create($request->all());

        return back()->withSuccess(trans('app.success_store'));
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
    public function edit($id)
    {
        $item = User::findOrFail($id);
        //dd($item);

        return view('admin.users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, User::rules(true, $id));

        $item = User::findOrFail($id);

        $item->update($request->all());

        return redirect()->route(ADMIN . '.users.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creditos($id)
    {
        return view('admin.users.creditos', compact('id'));
    }

    public function insertCredit($idPlan, $idUser)
    {
        $userCredit = new UserCredit;
        $userCredit->user_id = $idUser;
        $userCredit->paypalToken = 0;
        $userCredit->payerId = 0;

        switch($idPlan) {
            case 1:
                $userCredit->credits = 1;
            break;
            case 2:
                $userCredit->credits = 10;
            break;
            case 3:
                $userCredit->credits = 50;
            break;
            case 4:
                $userCredit->credits = 100;
            break;
            case 5:
                $userCredit->credits = 500;
            break;
        }

        $userCredit->save();

         return redirect()->route(ADMIN . '.users.index');
    }

    public function useReport()
    {
        $users = User::latest('updated_at')->get();
        $id = Auth::id();
        foreach($users as $user) {
            $creditosUser = DB::table("user_credit")->where('user_id' ,'=', $user->id)->sum('credits');
            $discountsUser = DB::table("discounts")->where('user_id' ,'=', $user->id)->sum('credits');
            $totalCreditsUser = $creditosUser - $discountsUser;
            $user->totalCredits = $totalCreditsUser;
            $user->discount = $discountsUser;
            $user->updatedAt = DB::table("user_credit")->select('created_at')->where('user_id' ,'=', $user->id)->first();
        }

        //dd($users);
        return view('admin.users.usereport', compact('users','total'));
    }



}

