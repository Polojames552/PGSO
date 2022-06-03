<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PgsoMedDentalSup;
use DB;
// use App\Exports\HealthExport;
use App\Exports\PgsoMedDentalSupExport;
use Maatwebsite\Excel\Facades\Excel;
class PgsoMedDentalSupController extends Controller
{
    function PgsoMedDentalSup_show(){
        $data = DB::table('pgso_med_dental_sups')->get();
        return view('pages.PGSOMedicalDental',['data'=>$data]);
    }
    public function store(Request $request)
    { 
        $data = new PgsoMedDentalSup();
        $data->article = $request->input('article'); /////Required
        $data->description = $request->input('description'); /////Required
        if($request->input('stockno') == ""){
            $data->stockno = " ";
        }else{
            $data->stockno = $request->input('stockno');
        }
        if($request->input('unitofmeasurement') == ""){
            $data->unitofmeasurement = " ";
        }else{
            $data->unitofmeasurement = $request->input('unitofmeasurement');
        }
        if($request->input('unitvalue') == ""){
            $data->unitvalue = " ";
        }else{
            $data->unitvalue = $request->input('unitvalue');
        }
        if($request->input('balancecard') == ""){
            $data->balancecard = " ";
        }else{
            $data->balancecard = $request->input('balancecard');
        }
        if($request->input('onhandcount') == ""){
            $data->onhandcount = " ";
        }else{
            $data->onhandcount = $request->input('onhandcount');
        }
        if($request->input('shortageqty') == ""){
            $data->shortageqty = " ";
        }else{
            $data->shortageqty = $request->input('shortageqty');
        }
        if($request->input('shortagevalue') == ""){
            $data->shortagevalue = " ";
        }else{
            $data->shortagevalue = $request->input('shortagevalue');
        }
        if($request->input('remark') == ""){
            $data->remark = " ";
        }else{
            $data->remark = $request->input('remark');
        }
  
        $data->save();
        return redirect('PGSOMedicalDental')->with('message','Data Added Successfully!');;
    }
    public function destroy($id)
    {
        $item = DB::table('pgso_med_dental_sups')->where('id', $id);
        $item->delete();
        return redirect('PGSOMedicalDental')->with('message', 'The data is successfully deleted!');
    }
    public function update_MedicalDentalData(Request $request, $id)
    {

        $article = $request->input('Editarticle'); /////Required
        $description = $request->input('Editdescription'); /////Required
        if($request->input('Editstockno') == ""){
            $stockno = " ";
        }else{
            $stockno = $request->input('Editstockno');
        }
        if($request->input('Editunitofmeasurement') == ""){
            $unitofmeasurement = " ";
        }else{
            $unitofmeasurement = $request->input('Editunitofmeasurement');
        }
        if($request->input('Editunitvalue') == ""){
            $unitvalue = " ";
        }else{
            $unitvalue = $request->input('Editunitvalue');
        }
        if($request->input('Editbalancecard') == ""){
            $balancecard = " ";
        }else{
            $balancecard = $request->input('Editbalancecard');
        }
        if($request->input('Editonhandcount') == ""){
            $onhandcount = " ";
        }else{
            $onhandcount = $request->input('Editonhandcount');
        }
        if($request->input('Editshortageqty') == ""){
            $shortageqty = " ";
        }else{
            $shortageqty = $request->input('Editshortageqty');
        }
        if($request->input('Editshortagevalue') == ""){
            $shortagevalue = " ";
        }else{
            $shortagevalue = $request->input('Editshortagevalue');
        }
        if($request->input('Editremark') == ""){
            $remark = " ";
        }else{
            $remark = $request->input('Editremark');
        }
        DB::table('pgso_med_dental_sups')
        ->where('id', $id)
        ->update(array(
        'article' => $article,
        'description' => $description,
        'stockno' => $stockno,
        'unitofmeasurement' => $unitofmeasurement,
        'unitvalue' => $unitvalue,
        'balancecard' => $balancecard,
        'onhandcount' => $onhandcount,
        'shortageqty' => $shortageqty,
        'shortagevalue' => $shortagevalue,
        'remark' => $remark,
        ));

        return redirect('PGSOMedicalDental')->with('message','Data updated successfully!');;
    }
    public function export()
    {
      return Excel::download(new PrietoDiazMedHospitalExport, 'Prieto-Diaz Medical Hospital.xlsx');
    }
}
