<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sw;
use DB;
class SwController extends Controller
{
    function Sw_show(){
        $data_sw = DB::table('sws')->get();
        return view('pages.SW',['data_sw'=>$data_sw]);
    }
    public function store(Request $request)
    {
        $data = new Sw();
        $data->sw_name = $request->input('sw_name');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('SW')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Sw::findOrFail($id);
        $user->delete();
        return redirect('SW')->with('message', 'The data is successfully deleted!');
    }
    public function update_sw(Request $request, $id)
    {
        $Sw = $request->input('EditSw');
        $Number = $request->input('EditNumber');

        DB::table('sws')
        ->where('id', $id)
        ->update(array(
        'sw_name' => $Sw,
        'number' => $Number
        ));

        return redirect('SW')->with('message','Data updated successfully!');;
    }
}
