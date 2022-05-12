<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
class InsertDataController extends Controller
{
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
}
