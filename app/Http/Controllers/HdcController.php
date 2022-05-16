<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hdc;
use DB;
class HdcController extends Controller
{
    function Hdc_show(){
        $data_hdc = DB::table('hdcs')->get();
        return view('pages.HDC',['data_hdc'=>$data_hdc]);
    }
    public function store(Request $request)
    {
        $data = new Hdc();
        $data->hdc_name = $request->input('hdc_name');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('HDC')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Hdc::findOrFail($id);
        $user->delete();
        return redirect('HDC')->with('message', 'The data is successfully deleted!');
    }
    public function update_hdc(Request $request, $id)
    {
        $Hdc = $request->input('EditHdc');
        $Number = $request->input('EditNumber');

        DB::table('hdcs')
        ->where('id', $id)
        ->update(array(
        'hdc_name' => $Hdc,
        'number' => $Number
        ));

        return redirect('HDC')->with('message','Data updated successfully!');;
    }
}
