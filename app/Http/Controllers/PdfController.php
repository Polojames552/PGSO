<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\health;
use App\Models\PrietoDiazMedHospital;
use App\Models\Tourism;
use App\Models\ProvincialAdminOffice;
use DB;
use PDF;

class PdfController extends Controller
{
    function PDFPrietoDiazMedHospitalData(){
        $health = DB::table('prieto_diaz_med_hospitals')->get();
        $count = DB::table('prieto_diaz_med_hospitals')->count();
        return view('PDF.PdfPrietoDiazMedHospital',['health'=>$health, 'count'=>$count]);
    }
    function PDFTourismData(){
        $tour = DB::table('tourisms')->get();
        $count = DB::table('tourisms')->count();
        return view('PDF.PdfTourism',['tour'=>$tour, 'count'=>$count]);
    }
    function PdfProvincialAdminData(){
        $data = DB::table('provincial_admin_offices')->get();
        $count = DB::table('provincial_admin_offices')->count();
        return view('PDF.PdfProvincialAdmin',['data'=>$data, 'count'=>$count]);
    }
    
    function PrietoDiazMedHospital_Export(){
         $health = PrietoDiazMedHospital::all();
         $count = DB::table('prieto_diaz_med_hospitals')->count();
         $pdf = PDF::loadView('PDF.PdfPrietoDiazMedHospital',[
             'health'=>$health, 'count'=>$count
         ]);
        
         return $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape')->download('Prieto-Diaz Medical Hospital.pdf');
    }
    function Tourism_Export(){
        $tour = Tourism::all();
        $count = DB::table('tourisms')->count();
        $pdf = PDF::loadView('PDF.PdfTourism',[
            'tour'=>$tour, 'count'=>$count
        ]);
       
        return $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape')->download('Tourism.pdf');
   }

   function ProvincialAdmin_Export(){
    $data = ProvincialAdminOffice::all();
    $count = DB::table('provincial_admin_offices')->count();
    $pdf = PDF::loadView('PDF.PdfProvincialAdmin',[
        'data'=>$data, 'count'=>$count
    ]);
   
    return $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape')->download('Provincial Administrator Office.pdf');
}
 
}
