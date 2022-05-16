<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Other;
use DB;
class OtherController extends Controller
{
    function Other_show(){
        $data_other = DB::table('others')->get();
        return view('pages.Others',['data_other'=>$data_other]);
    }
    public function store(Request $request)
    {
        $data = new Other();
        $data->other_name = $request->input('other_name');
        $data->number = $request->input('Number');
        $data->save();
        return redirect('Others')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Other::findOrFail($id);
        $user->delete();
        return redirect('Others')->with('message', 'The data is successfully deleted!');
    }
    public function update_other(Request $request, $id)
    {
        $Other = $request->input('EditOther');
        $Number = $request->input('EditNumber');

        DB::table('others')
        ->where('id', $id)
        ->update(array(
        'other_name' => $Other,
        'number' => $Number
        ));

        return redirect('Others')->with('message','Data updated successfully!');;
    }
}
