<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conge;
use App\Models\Cconge;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conge=Conge::
        join('personnels','personnels.PERS_MAT_95','conges.CONG_NUMORD_93')
        ->join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
        ->join('nature_conges','conges.CONG_NAT_9','nature_conges.CODE')
         ->get();
         return response()->json($conge,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Conge::create($input);
        return ('created succ');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($PERS_MAT_95)
    {
        $conge=Conge::
            join('personnels','personnels.PERS_MAT_95','conges.CONG_NUMORD_93')
            ->join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
            ->join('nature_conges','conges.CONG_NAT_9','nature_conges.CODE')
            ->where('conges.CONG_NUMORD_93',$PERS_MAT_95)
            ->get() ;
                // $count =  $personnels->count();
                // dd($count);
            return  $conge;
    }

    public function solde($PERS_MAT_95)
    {
        $conge=Cconge::
            // join('personnels','personnels.PERS_MAT_95','conges.CONG_NUMORD_93')
            // ->join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
            join('nature_conges','cconges.CCONG_NAT_9','nature_conges.CODE')
            ->where('cconges.CCONG_MAT_95',$PERS_MAT_95)
            ->get() ;
                // $count =  $personnels->count();
                // dd($count);
            return  $conge;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
