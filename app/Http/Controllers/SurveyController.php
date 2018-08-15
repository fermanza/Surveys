<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Template;
use App\Options;
use App\Questions;
use App\Answer;
use DB;
use Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::latest('updated_at')->get();
        $id = Auth::id();
        $creditos=DB::table("user_credit")->where('user_id','=',$id)->sum('credits');
        $discounts=DB::table("discounts")->where('user_id','=',$id)->sum('credits');
        $total = $creditos-$discounts;
        // $templates = Template::where('user_id', '=', $id)->where('approval', '=', '1')->orWhereNull('approval')->latest()->get();
        $templates = Template::latest()->get();
        return view('admin.surveys.index', compact('items','total','templates'));
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
    public function edit($id)
    {
        //
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
        //
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
}
