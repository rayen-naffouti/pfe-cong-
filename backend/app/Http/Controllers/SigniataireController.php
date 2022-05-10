<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signataire;
use Illuminate\Support\Facades\DB;

class SigniataireController extends Controller
{
    public function perssign($PERS_MAT_95)
    {
        //  $user = Auth::user();
         $Signataires=Signataire::
            // join('personnels','personnels.PERS_MAT_95','signataires.PERS_ID')
            where('signataires.PERS_ID',$PERS_MAT_95)
            ->orderBy('order')
            ->select('PERS_ID', 'signataire_ID','order')
            ->get();
         return ($Signataires);
    }
    

    public function addsign(Request $request)
    {
        
        $data = $request->all();
        $sign = $data[0]['PERS_ID'];
        Signataire::where('PERS_ID', $sign)->delete();
        // dd($sign);
        DB::table('signataires')->insert($data);

        // foreach($request->input('item') as $key => $value) {

        //     $Record= new ModelName;

        //     $Record->name = $request->get('name')[$key];
        //     $Record->item_no = $request->get('item')[$key];
        //     $Record->description =$request->get('desc')[$key]; 
        //     $Record->save();
        // }


        // $data = $request->all();
        // $signataire = new Signataire;
        // dd($request);

        // for ( $i = 0; $i < count($data); $i++) {
        //     Signataire::create([
        //         'PERS_ID' => $request->PERS_ID,
        //         'signataire_ID' => $request->signataire_ID,
        //         'order' => $request->order,
        //     ]);
        // }


        // dd($request);
    //     $sign = [];
    // for ($i = 0; $i < count($request->signataire_ID); $i++) {
    //     $sign[] = [
    //         'PERS_ID' => $request->PERS_ID[$i],
    //         'signataire_ID' => $request->signataire_ID[$i],
    //         'order' => $request->order[$i]
    //     ];
    // }
    // dd($sign);


        // $data = $request->all();
        // // dd($data[0]['PERS_ID']);
        // // foreach ( $signataire as $data) {
        // for ($i = 0; $i < count($data); $i++) {
        //     $signataires[] = [
        //     'PERS_ID' =>  $data[0]['PERS_ID'],
        //     'signataire_ID' => $data[0]['PERS_ID'],
        //     'order' =>  $data[0]['PERS_ID']
        //     ];
        // }
        // dd($signataires);


        // $signataire = new Signataire;
        // $signataire->PERS_ID = $request->input('PERS_ID');
        // $signataire->signataire_ID = $request->input('signataire_ID');
        // $signataire->order = $request->input('order');
        // $signataire->save();
        
    }
}
