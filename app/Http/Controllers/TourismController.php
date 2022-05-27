<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourism;
use DB;
use App\Exports\TourismExport;
use Maatwebsite\Excel\Facades\Excel;
class TourismController extends Controller
{
    function Tourism_show(){
        $tour = DB::table('tourisms')->get();
        return view('pages.Tourism',['tour'=>$tour]);
    }
    public function store(Request $request)
    {
        $data = new Tourism();
        $data->Property_No = $request->input('Property_No'); /////Required
        $data->Description = $request->input('Description'); /////Required
        if($request->input('Date_Aquired') == ""){
            $data->Date_Aquired = "";
        }else{
            $data->Date_Aquired = $request->input('Date_Aquired');
        }
        $data->Aquisition_Cost = $request->input('Aquisition_Cost');////Required
        // $data->Accountable_Person = $request->input('Accountable_Person');
        if($request->input('Accountable_Person') == ""){
            $data->Accountable_Person = "";
        }else{
            $data->Accountable_Person = $request->input('Accountable_Person');
        }
        // $data->Location = $request->input('Location');
        if($request->input('Location') == ""){
            $data->Location = "";
        }else{
            $data->Location = $request->input('Location');
        }
        // $data->Med_dental_equipment = $request->input('Med_dental_equipment');
        if($request->input('Med_dental_equipment') == ""){
            $data->Med_dental_equipment = "";
        }else{
            $data->Med_dental_equipment = $request->input('Med_dental_equipment');
        }
        // $data->Office_Eq = $request->input('Office_Eq');
        if($request->input('Office_Eq') == ""){
            $data->Office_Eq = "";
        }else{
            $data->Office_Eq = $request->input('Office_Eq');
        }
        // $data->Hospital_Eq = $request->input('Hospital_Eq');
        if($request->input('Hospital_Eq') == ""){
            $data->Hospital_Eq = "";
        }else{
            $data->Hospital_Eq = $request->input('Hospital_Eq');
        }
        // $data->FurnitureNFixtures = $request->input('FurnitureNFixtures');
        if($request->input('FurnitureNFixtures') == ""){
            $data->FurnitureNFixtures = "";
        }else{
            $data->FurnitureNFixtures = $request->input('FurnitureNFixtures');
        }
        // $data->Motor_Vehicles = $request->input('Motor_Vehicles');
        if($request->input('Motor_Vehicles') == ""){
            $data->Motor_Vehicles = "";
        }else{
            $data->Motor_Vehicles = $request->input('Motor_Vehicles');
        }
        // $data->Info_Tech = $request->input('Info_Tech');
        if($request->input('Info_Tech') == ""){
            $data->Info_Tech = "";
        }else{
            $data->Info_Tech = $request->input('Info_Tech');
        }
        //$data->Other_Machine_Eq = $request->input('Other_Machine_Eq');
        if($request->input('Other_Machine_Eq') == ""){
            $data->Other_Machine_Eq = "";
        }else{
            $data->Other_Machine_Eq = $request->input('Other_Machine_Eq');
        }
        // $data->Other_Asset = $request->input('Other_Asset');
        if($request->input('Other_Asset') == ""){
            $data->Other_Asset = "";
        }else{
            $data->Other_Asset = $request->input('Other_Asset');
        }
        // $data->Remark = $request->input('Remark');
        if($request->input('Remark') == ""){
            $data->Remark = "";
        }else{
            $data->Remark = $request->input('Remark');
        }
  
        $data->save();
        return redirect('Tourism')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $item = DB::table('tourisms')->where('Property_No', $id);
        $item->delete();
        return redirect('Tourism')->with('message', 'The data is successfully deleted!');
    }
    public function update_tourism(Request $request, $id)
    {
        $Property_No = $request->input('EditProperty_No');
        $Description = $request->input('EditDescription');
        if($request->input('EditDate_Aquired') == ""){
            $Date_Aquired = "";
        }else{
            $Date_Aquired = $request->input('EditDate_Aquired');
        }
        if($request->input('EditAquisition_Cost') == ""){
            $Aquisition_Cost = "";
        }else{
            $Aquisition_Cost = $request->input('EditAquisition_Cost');
        }
        if($request->input('EditAccountable_Person') == ""){
            $Accountable_Person = "";
        }else{
            $Accountable_Person = $request->input('EditAccountable_Person');
        }
        if($request->input('EditLocation') == ""){
            $Location = "";
        }else{
            $Location = $request->input('EditLocation');
        }
        if($request->input('EditMed_dental_equipment') == ""){
            $Med_dental_equipment = "";
        }else{
            $Med_dental_equipment = $request->input('EditMed_dental_equipment');
        }
        if($request->input('EditOffice_Eq') == ""){
            $Office_Eq = "";
        }else{
            $Office_Eq = $request->input('EditOffice_Eq');
        }
        if($request->input('EditHospital_Eq') == ""){
            $Hospital_Eq = "";
        }else{
            $Hospital_Eq = $request->input('EditHospital_Eq');
        }
        if($request->input('EditFurnitureNFixtures') == ""){
            $FurnitureNFixtures = "";
        }else{
            $FurnitureNFixtures = $request->input('EditFurnitureNFixtures');
        }
        if($request->input('EditMotor_Vehicles') == ""){
            $Motor_Vehicles = "";
        }else{
            $Motor_Vehicles = $request->input('EditMotor_Vehicles');
        }
        if($request->input('EditInfo_Tech') == ""){
            $Info_Tech = "";
        }else{
            $Info_Tech = $request->input('EditInfo_Tech');
        }
        if($request->input('EditOther_Machine_Eq') == ""){
            $Other_Machine_Eq = "";
        }else{
            $Other_Machine_Eq = $request->input('EditOther_Machine_Eq');
        }
        if($request->input('EditOther_Asset') == ""){
            $Other_Asset = "";
        }else{
            $Other_Asset = $request->input('EditOther_Asset');
        }
        if($request->input('EditRemark') == ""){
            $Remark = "";
        }else{
            $Remark = $request->input('EditRemark');
        }

        DB::table('tourisms')
        ->where('Property_No', $Property_No)
        ->update(array(
        'Property_No' => $Property_No,
        'Description' => $Description,
        'Date_Aquired' => $Date_Aquired,
        'Aquisition_Cost' => $Aquisition_Cost,
        'Accountable_Person' => $Accountable_Person,
        'Location' => $Location,
        'Med_dental_equipment' => $Med_dental_equipment,
        'Office_Eq' => $Office_Eq,
        'Hospital_Eq' => $Hospital_Eq,
        'FurnitureNFixtures' => $FurnitureNFixtures,
        'Motor_Vehicles' => $Motor_Vehicles,
        'Info_Tech' => $Info_Tech,
        'Other_Machine_Eq' => $Other_Machine_Eq,
        'Other_Asset' => $Other_Asset,
        'Remark' => $Remark
        ));

        return redirect('Tourism')->with('message','Data updated successfully!');;
    }
    public function export()
    {
      return Excel::download(new TourismExport, 'Tourism.xlsx');
    }
}
