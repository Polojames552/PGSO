<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gpss;
use DB;
class GpssController extends Controller
{
    function Gpss_show(){
        $data_gpss = DB::table('gpsses')->get();
        return view('pages.GPSS',['data_gpss'=>$data_gpss]);
    }
    public function store(Request $request)
    {
        $data = new Gpss();
        $data->gpss = $request->input('Gpss');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('GPSS')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Gpss::findOrFail($id);
        $user->delete();
        return redirect('GPSS')->with('message', 'The data is successfully deleted!');
    }
    public function update_gpss(Request $request, $id)
    {
        $Gpss = $request->input('EditGpss');
        $Number = $request->input('EditNumber');

        DB::table('gpsses')
        ->where('id', $id)
        ->update(array(
        'Gpss' => $Gpss,
        'Number' => $Number
        ));

        return redirect('GPSS')->with('message','Data updated successfully!');;
    }
}
