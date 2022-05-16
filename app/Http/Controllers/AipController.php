<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aip;
use DB;
class AipController extends Controller
{
    function AIP_show(){
        $aip = DB::table('aips')->get();
        return view('pages.AIP',['aip'=>$aip]);
    }
    public function store(Request $request)
    {
        $data = new aip();
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->contact = $request->input('contact');
        $data->age = $request->input('age');
        $data->save();
        return redirect('AIP')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $aip = Aip::findOrFail($id);
        $aip->delete();
        return redirect('AIP')->with('message', 'The data is successfully deleted!');
    }
    public function update_aip(Request $request, $id)
    {
        $name = $request->input('EditName');
        $add = $request->input('EditAddress');
        $contact = $request->input('EditContact');
        $age = $request->input('EditAge');
     
        DB::table('aips')
        ->where('id', $id)
        ->update(array(
        'name' => $name,
        'address' => $add,
        'contact' => $contact,
        'age' => $age
        ));

        return redirect('AIP')->with('message','Data updated successfully!');;
    }
}
