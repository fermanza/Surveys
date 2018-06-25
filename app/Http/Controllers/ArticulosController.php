<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileControl\FileControl;
use App\Articulo;
use Auth;
use DB;
use Bitly;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all()); 
        $articulos = Articulo::Search($request->articulo)->latest()->paginate(5);
        $user = Auth::user();

        
        return view('articulos.index', compact('articulos', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
    
        if($request->hasFile('img')) {
            $fileName = FileControl::storeFile($request->img, 'articles');
            $request->img = "/articles/{$fileName}"; 
        }


        $articulo = new Articulo();
        $articulo->title = $request->title;
        $articulo->body = $request->blog;
        $articulo->img = $request->img;
        $articulo->user_id = Auth::user()->id;
        $articulo->save();


        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $articulo = Articulo::find($id);
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $articulo = Articulo::find($id);
         return view('articulos.edit', compact('articulo'));
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
        $articulo = Articulo::find($id);


        if($request->hasFile('img')) {
              $fileName = FileControl::updateFile($articulo->img, $request->img, 'articles');
              $request->img = "/articles/{$fileName}"; 
              $articulo->img = $request->img;
        }
        $articulo->title = $request->title;
        $articulo->body = $request->blog;
        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $res = FileControl::deleteFile($articulo->img, 'articles');
        $articulo->delete();

        return redirect('/articulos');
    }



    public function bitly($id)
    {
        $articulo = Articulo::find($id);
        $url=url('/articulos').'/'.$articulo->id;
        $urlbit = Bitly::getUrl($url); // http://bit.ly/nHcn3
        return response()->json($urlbit,200);

    }


}
