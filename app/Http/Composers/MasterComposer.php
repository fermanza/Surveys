<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Articulo;

class MasterComposer {

    public function compose(View $view)
    {
        $articulos=Articulo::orderBy('id', 'desc')->take(5)->get();
        $view->with('articulos', $articulos);
    }

}