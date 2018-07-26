<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

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
<<<<<<< HEAD
        $creditos=DB::table("user_credit")->where('user_id','=',$id)->sum('credits');
        $discounts=DB::table("discounts")->where('user_id','=',$id)->sum('credits');
        $total = $creditos-$discounts;


        return view('admin.users.index', compact('items','total'));
=======
        foreach($users as $user) {
            $creditosUser = DB::table("user_credit")->where('user_id' ,'=', $user->id)->sum('credits');
            $discountsUser = DB::table("discounts")->where('user_id' ,'=', $user->id)->sum('credits');
            $totalCreditsUser = $creditosUser - $discountsUser;
            $user->totalCredits = $totalCreditsUser;
        }
       
        return view('admin.users.index', compact('users','total'));
>>>>>>> 5d66fa7b3194db78864a87a8acea682070bcfe56
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
        return view('admin.users.creditos');
    }
}

