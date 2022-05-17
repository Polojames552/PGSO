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
        return view('Pdf',['health'=>$health]);
    }
    // function PDF_health(){
    //       $health = health::all();
    //   // share data to view
    //   view()->share('pages.Health',$health);
    //   $pdf = PDF::loadView('Pdf', $health);
    //   // download PDF file with download method
    //   return $pdf->download('pdf_file.pdf');
    // }
 
}
