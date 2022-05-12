<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use DB;
class AssetController extends Controller
{
    function Assets_show(){
        $asset = DB::table('assets')->get();
        return view('pages.Assets',['asset'=>$asset]);
    }
    public function store(Request $request)
    {
        $data = new Asset();
        $data->Product_name = $request->input('Product_name');
        $data->Quantity = $request->input('Quantity');
        $data->Condition = $request->input('Condition');
        $data->Price = $request->input('Price');
        $data->save();
        return redirect('Assets')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $user = Asset::findOrFail($id);
        $user->delete();
        return redirect('Assets')->with('message', 'The data is successfully deleted!');
    }
}
