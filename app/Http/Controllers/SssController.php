<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sss;
use DB;
class SssController extends Controller
{
    function Sss_show(){
        $data_sss = DB::table('ssses')->get();
        return view('pages.SSS',['data_sss'=>$data_sss]);
    }
    public function store(Request $request)
    {
        $data = new Sss();
        $data->sss_name = $request->input('sss_name');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('SSS')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Sss::findOrFail($id);
        $user->delete();
        return redirect('SSS')->with('message', 'The data is successfully deleted!');
    }
    public function update_sss(Request $request, $id)
    {
        $Sss = $request->input('EditSss');
        $Number = $request->input('EditNumber');

        DB::table('ssses')
        ->where('id', $id)
        ->update(array(
        'sss_name' => $Sss,
        'number' => $Number
        ));

        return redirect('SSS')->with('message','Data updated successfully!');;
    }
}
