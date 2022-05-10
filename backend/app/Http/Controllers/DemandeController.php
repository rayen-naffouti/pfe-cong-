<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandeconge;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;

class DemandeController extends Controller
{
    public function index()
    {
         $Demandeconge=Demandeconge:: 
         join('personnels','personnels.PERS_MAT_95','demandeconges.PERS_ID')
         ->join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
         ->join('nature_conges','demandeconges.natureconge','nature_conges.CODE')
         ->join('users','demandeconges.PERS_ID','users.id')
         ->get();
         return response()->json($Demandeconge,200);
    }

    public function persdemande($PERS_MAT_95)
    {
        //  $user = Auth::user();
         $Demandeconge=Demandeconge::
            join('personnels','personnels.PERS_MAT_95','demandeconges.PERS_ID')
            ->join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
            ->join('nature_conges','demandeconges.natureconge','nature_conges.CODE')
            ->where('demandeconges.PERS_ID',$PERS_MAT_95)
            ->get();
         return ($Demandeconge);
    }


    public function save(Request $request){
 

        $pdf = PDF::loadView('pdf',[
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'natureconge' => $request->input('natureconge'),
            'matricule' => $request->input('matricule'),
            'natureagent' => $request->input('natureagent'),
            'direction' => $request->input('direction'),
            'debut' => $request->input('debut'),
            'debutX' => $request->input('debutX'),
            'fin' => $request->input('fin'),
            'finx' => $request->input('finx'),
            'adresse' => $request->input('adresse'),
            'tel' => $request->input('tel'),
            'nbrjour' => $request->input('nbrjour'),
        ]);

        $filename = '-'.rand() .'_'.time(). '.'.'pdf';
        
        Storage::put('public/storage/'.$filename,$pdf->output());
       
        $demandeconge = new Demandeconge;
        $demandeconge->PERS_ID = $request['PERS_ID'];
        $demandeconge->natureconge = $request['natureconge'];
        $demandeconge->debut = $request['debut'];
        $demandeconge->debutX = $request['debutX'];
        $demandeconge->fin = $request['fin'];
        $demandeconge->finx = $request['finx'];
        $demandeconge->adresse = $request['adresse'];
        $demandeconge->tel = $request['tel'];
        $demandeconge->nbrjour = $request['nbrjour'];
        $demandeconge->pdf = $request->input('pdf', $filename);
        $demandeconge->save();

        // if($demandeconge->save()){
        //     Demandeconge::sendDemandeconge($demandeconge, $pdf);
        // }

        // return Demandeconge::create([
        //     'PERS_ID' => $request->input('PERS_ID'),
        //     'natureconge' => $request->input('natureconge'),
        //     'debut' => $request->input('debut'),
        //     'debutX' => $request->input('debutX'),
        //     'fin' => $request->input('fin'),
        //     'finx' => $request->input('finx'),
        //     'adresse' => $request->input('adresse'),
        //     'tel' => $request->input('tel'),
        //     'nbrjour' => $request->input('nbrjour'),
        //     'pdf' => $request->input('pdf', $filename)
            
        // ]);
    }
}
