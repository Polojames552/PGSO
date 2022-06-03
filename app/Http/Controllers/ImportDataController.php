<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrietoDiazMedHospital;
use DB;
use Excel;
use App\Imports\PrietoDiazMedImport;
use App\Imports\ProvincialAdminOfficeImport;
class ImportDataController extends Controller
{
    function index(){
        $data = DB::table('prieto_diaz_med_hospitals')->get();
        return view('PrietoDiazMedHospital',compact('data'));
    }

//     function PrietoDiazMedHospital_Export(){
//         $health = PrietoDiazMedHospital::all();
//         $count = DB::table('prieto_diaz_med_hospitals')->count();
//         $pdf = PDF::loadView('PDF.PdfPrietoDiazMedHospital',[
//             'health'=>$health, 'count'=>$count
//         ]);
       
//         return $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape')->download('Prieto-Diaz Medical Hospital.pdf');
//    }

    function PrietoDiazMedHospitalImport(Request $request){
        $request->validate([
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new PrietoDiazMedImport, $request->file('select_file'));
        // (new PrietoDiazMedImport)->import( $request->file('select_file'), null, \Maatwebsite\Excel\Excel::XLSX);
        // $path = $request->file('select_file')->getRealPath();
        // Excel::import(new PrietoDiazMedImport, $path);
        // $path = $request->file('select_file')->store();
        // (new PrietoDiazMedImport)->import($path);

        // try{
        //      $data = Excel::import(new PrietoDiazMedImport, $path);
        //  }catch(\Exception){
        //      return back()->withError('Error');
        //  }
        return  redirect()->back()->with('message', 'Data Import Successful!');
    }
    function ProvincialAdminOfficeImport(Request $request){
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();
        Excel::import(new ProvincialAdminOfficeImport, $path);
        return back()->with('message', 'Data Import Successful!');
    }
}
