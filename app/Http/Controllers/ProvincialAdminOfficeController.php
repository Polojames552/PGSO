<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvincialAdminOffice;
use DB;
use App\Exports\ProvincialAdminOfficeExport;
use Maatwebsite\Excel\Facades\Excel;
class ProvincialAdminOfficeController extends Controller
{
    function ProvincialAdminOffice_show(){
        $data = DB::table('provincial_admin_offices')->get();
        $count = DB::table('provincial_admin_offices')->count();
        return view('pages.ProvincialAdminOffice',['data'=>$data]);
    }
    public function store(Request $request)
    { 
        $data = new ProvincialAdminOffice();
        $data->Property_No = $request->input('Property_No'); /////Required
        $data->Particulars = $request->input('Particulars'); /////Required
        if($request->input('Date_Aquired') == ""){
            $data->Date_Aquired = " ";
        }else{
            $data->Date_Aquired = $request->input('Date_Aquired');
        }
        // $data->Accountable_Person = $request->input('Accountable_Person');
        if($request->input('Quantity') == ""){
            $data->Quantity = " ";
        }else{
            $data->Quantity = $request->input('Quantity');
        }
        // $data->Location = $request->input('Location');
        if($request->input('Unit_Cost') == ""){
            $data->Unit_Cost = " ";
        }else{
            $data->Unit_Cost = $request->input('Unit_Cost');
        }
        // $data->Med_dental_equipment = $request->input('Med_dental_equipment');
        if($request->input('Total_Cost') == ""){
            $data->Total_Cost = " ";
        }else{
            $data->Total_Cost = $request->input('Total_Cost');
        }
        // $data->Office_Eq = $request->input('Office_Eq');
        if($request->input('Accumulated_Depreciation') == ""){
            $data->Accumulated_Depreciation = " ";
        }else{
            $data->Accumulated_Depreciation = $request->input('Accumulated_Depreciation');
        }
        // $data->Hospital_Eq = $request->input('Hospital_Eq');
        if($request->input('NetBookValue') == ""){
            $data->NetBookValue = " ";
        }else{
            $data->NetBookValue = $request->input('NetBookValue');
        }
        if($request->input('Remark') == ""){
            $data->Remark = " ";
        }else{
            $data->Remark = $request->input('Remark');
        }
        $data->save();
        return redirect('ProvincialAdminOffice')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $item = DB::table('provincial_admin_offices')->where('Property_No', $id);
        $item->delete();
        return redirect('ProvincialAdminOffice')->with('message', 'The data is successfully deleted!');
    }
    public function update_ProvincialData(Request $request, $id)
    {
        $Date_Aquired = $request->input('EditDate_Aquired');
        $Particulars = $request->input('EditParticulars');
        $Property_No = $request->input('EditProperty_No');
        $Quantity = $request->input('EditQuantity');
        // $Unit_Cost = $request->input('EditUnit_Cost');
        if($request->input('EditUnit_Cost') == ""){
            $Unit_Cost = " ";
        }else{
            $Unit_Cost = $request->input('EditUnit_Cost');
        }
        // $Total_Cost = $request->input('EditTotal_Cost');
        if($request->input('EditTotal_Cost') == ""){
            $Total_Cost = " ";
        }else{
            $Total_Cost = $request->input('EditTotal_Cost');
        }
        // $Accumulated_Depreciation = $request->input('EditAccumulated_Depreciation');
        if($request->input('EditAccumulated_Depreciation') == ""){
            $Accumulated_Depreciation = " ";
        }else{
            $Accumulated_Depreciation = $request->input('EditAccumulated_Depreciation');
        }
        // $NetBookValue = $request->input('EditNetBookValue');
        if($request->input('EditNetBookValue') == ""){
            $NetBookValue = " ";
        }else{
            $NetBookValue = $request->input('EditNetBookValue');
        }
        // $Remark = $request->input('EditRemark');
        if($request->input('EditRemark') == ""){
            $Remark = " ";
        }else{
            $Remark = $request->input('EditRemark');
        }

        DB::table('provincial_admin_offices')
        ->where('Property_No', $Property_No)
        ->update(array(
        'Property_No' => $Property_No,
        'Particulars' => $Particulars,
        'Date_Aquired' => $Date_Aquired,
        'Quantity' => $Quantity,
        'Unit_Cost' => $Unit_Cost,
        'Total_Cost' => $Total_Cost,
        'Accumulated_Depreciation' => $Accumulated_Depreciation,
        'NetBookValue' => $NetBookValue,
        'Remark' => $Remark,
        ));

        return redirect('ProvincialAdminOffice')->with('message','Data updated successfully!');;
    }
    public function export()
    {
      return Excel::download(new ProvincialAdminOfficeExport, 'ProvincialAdminOffice.xlsx');
    }
}
