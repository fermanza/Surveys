<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel\Excel;

class ExcelController extends Controller
{
    public function __construct(){

    }

    public function getBladeExcel(){

        \Excel::create('Ok', function($excel) {
            $excel->sheet('Ok', function($sheet) {
                $sheet->loadView('encuestas_publicas.advanced_report');
            });
        })->download('xlsx');
        //return view('thecodingstuff.bladexcel');
    }
}
