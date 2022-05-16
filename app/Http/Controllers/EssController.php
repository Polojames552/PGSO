<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ess;
use DB;
class EssController extends Controller
{
    function Ess_show(){
        $data_ess = DB::table('esses')->get();
        return view('pages.ESS',['data_ess'=>$data_ess]);
    }
    public function store(Request $request)
    {
        $data = new Ess();
        $data->ess_name = $request->input('ess_name');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('ESS')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Ess::findOrFail($id);
        $user->delete();
        return redirect('ESS')->with('message', 'The data is successfully deleted!');
    }
    public function update_ess(Request $request, $id)
    {
        $Ess = $request->input('EditEss');
        $Number = $request->input('EditNumber');

        DB::table('esses')
        ->where('id', $id)
        ->update(array(
        'ess_name' => $Ess,
        'number' => $Number
        ));

        return redirect('ESS')->with('message','Data updated successfully!');;
    }
}
