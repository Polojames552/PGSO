<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\health;
use DB;
class HealthController extends Controller
{
    function Health_show(){
        $health = DB::table('healths')->get();
        return view('pages.Health',['health'=>$health]);
    }
    public function store(Request $request)
    {
       
        $data = new health();
        $data->Property_No = $request->input('Property_No');
        $data->Description = $request->input('Description');
        $data->Date_Aquired = $request->input('Date_Aquired');
        $data->Aquisition_Cost = $request->input('Aquisition_Cost');
        $data->Accountable_Person = $request->input('Accountable_Person');
        $data->Location = $request->input('Location');
        $data->Med_dental_equipment = $request->input('Med_dental_equipment');
        $data->Office_Eq = $request->input('Office_Eq');
        $data->Hospital_Eq = $request->input('Hospital_Eq');
        $data->FurnitureNFixtures = $request->input('FurnitureNFixtures');
        $data->Motor_Vehicles = $request->input('Motor_Vehicles');
        $data->Info_Tech = $request->input('Info_Tech');
        $data->Other_Machine_Eq = $request->input('Other_Machine_Eq');
        $data->Other_Asset = $request->input('Other_Asset');
        $data->Remark = $request->input('Remark');
  
        $data->save();
        return redirect('Health')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $item = DB::table('healths')->where('Property_No', $id);
        $item->delete();
        return redirect('Health')->with('message', 'The data is successfully deleted!');
    }
    public function update_health(Request $request, $id)
    {
        $Property_No = $request->input('EditProperty_No');
        $Description = $request->input('EditDescription');
        $Date_Aquired = $request->input('EditDate_Aquired');
        $Aquisition_Cost = $request->input('EditAquisition_Cost');
        $Accountable_Person = $request->input('EditAccountable_Person');
        $Location = $request->input('EditLocation');
        $Med_dental_equipment = $request->input('EditMed_dental_equipment');
        $Office_Eq = $request->input('EditOffice_Eq');
        $Hospital_Eq = $request->input('EditHospital_Eq');
        $FurnitureNFixtures = $request->input('EditFurnitureNFixtures');
        $Motor_Vehicles = $request->input('EditMotor_Vehicles');
        $Info_Tech = $request->input('EditInfo_Tech');
        $Other_Machine_Eq = $request->input('EditOther_Machine_Eq');
        $Other_Asset = $request->input('EditOther_Asset');
        $Remark = $request->input('EditRemark');

        DB::table('healths')
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

        return redirect('Health')->with('message','Data updated successfully!');;
    }
}
