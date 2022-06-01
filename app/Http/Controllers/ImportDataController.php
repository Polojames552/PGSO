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
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();
        Excel::import(new PrietoDiazMedImport, $path);
        // $path = $request->file('select_file')->store();
        // (new PrietoDiazMedImport)->import($path);

        // try{
        //      $data = Excel::import(new PrietoDiazMedImport, $path);
        //  }catch(\Exception){
        //      return back()->withError('Error');
        //  }
        // if($data->count() > 0){
        //     foreach($data->toArray() as $key => $value){
        //         foreach($value as $row){
        //             $insert_data[]=array(
        //                 'Property_No' => $row['Property_No'],
        //                 'Description' => $row['Description'],
        //                 'Date_Aquired' => $row['Date_Aquired'],
        //                 'Aquisition_Cost' => $row['Aquisition_Cost'],
        //                 'Accountable_Person' => $row['Accountable_Person'],
        //                 'Location' => $row['Location'],
        //                 'Med_dental_equipment' => $row['Med_dental_equipment'],
        //                 'Office_Eq' => $row['Office_Eq'],
        //                 'Hospital_Eq' => $row['Hospital_Eq'],
        //                 'FurnitureNFixtures' => $row['FurnitureNFixtures'],
        //                 'Motor_Vehicles' => $row['Motor_Vehicles'],
        //                 'Info_Tech' => $row['Info_Tech'],
        //                 'Other_Machine_Eq' => $row['Other_Machine_Eq'],
        //                 'Other_Asset' => $row['Other_Asset'],
        //                 'Remark' => $row['Remark'],
        //             );
        //         }
        //     }
        //     if(!empty($insert_data)){
        //         DB::table('prieto_diaz_med_hospitals')->insert($insert_data);
        //     }
        // }
        
        return back()->with('message', 'Data Import Successful!');
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
