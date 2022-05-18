<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\health;
use DB;
use PDF;
class PdfController extends Controller
{
    function GetHealthData(){
        $health = DB::table('healths')->get();
        $count = DB::table('healths')->count();
        return view('Pdf',['health'=>$health, 'count'=>$count]);
    }
    function PDF_health(){
      $health = health::all();
       view()->share('pages.Health',$health);
      $pdf = PDF::loadView('Pdf', $health);
      return $pdf->download('pdf_file.pdf');    
    }
    function Health_Export(){
        $health = health::all();
        $count = DB::table('healths')->count();
        $pdf = PDF::loadView('Pdf',[
            'health'=>$health, 'count'=>$count
        ]);
        return $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape')->download('PGSO_Health.pdf');
    }
 
}
