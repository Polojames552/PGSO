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
        // 'Property_No',
        // 'Description',
        // 'Date_Aquired',
        // 'Aquisition_Cost',
        // 'Accountable_Person',
        // 'Location',
        // 'Med_dental_equipment',
        // 'Office_Eq',
        // 'Hospital_Eq',
        // 'FurnitureNFixtures',
        // 'Motor_Vehicles',
        // 'Other_Machine_Eq',
        // 'Other_Asset',
        // 'Remark', 
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
}
