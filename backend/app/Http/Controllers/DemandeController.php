<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandeconge;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Service\NgSignService;
use DateTime;
use App\Models\Signataire;

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

         $json = array();
         foreach($Demandeconge as $demande){
             $json[]=['demande'=>$demande,"ngsign"=>$demande->ngsign];
         }
        //  json_encode($json);
            return ($json);

        //  return response()->json($Demandeconge,200);
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


        
            $json = array();
            foreach($Demandeconge as $demande){
                $json[]=['demande'=>$demande,"ngsign"=>$demande->ngsign];
            }
           //  json_encode($json);
               return ($json);
        //  return ($Demandeconge);
    }


    public function save(Request $request,NgSignService $NgSignService ){
 
        $fdate = $request['fin'];
        $tdate = $request['debut'];
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $nature = $request['natureconge'];
        if ($nature == 1) {
            $naturecong = "Annuel";
        } elseif ($nature == 2) {
            $naturecong = "Exceptionnel";
        } else {
            $naturecong = "Recuperation";
        }

        // dd($naturecong);

        $PERS_ID = $request['PERS_ID'];

        // dd($PERS_ID);
        $signers = Signataire::
        where('PERS_ID', $PERS_ID)
        ->get();
        foreach($signers as $sign){
            $json=[
                'firstName'=>$sign->prenom,
                "lastName"=>$sign->nom,
                "email"=>$sign->signataire_ID,
                "phoneNumber"=>$sign->tel
            ];
        }
        // return($json);


        $pdf = PDF::loadView('pdf',[
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'natureconge' =>  $naturecong,
            'matricule' => $request->input('matricule'),
            'natureagent' => $request->input('natureagent'),
            'direction' => $request->input('direction'),
            'debut' => $request->input('debut'),
            'debutX' => $request->input('debutX'),
            'fin' => $request->input('fin'),
            'finx' => $request->input('finx'),
            'adresse' => $request->input('adresse'),
            'tel' => $request->input('tel'),
            'nbrjour' => $request->input('nbrjour', $days),
        ]);

        

        $filename = '-'.rand() .'_'.time(). '.'.'pdf';
        
        Storage::put('public/storage/'.$filename,$pdf->output());

        $base64 = base64_encode(file_get_contents(public_path('storage/storage/'.$filename)));

        $upload = $NgSignService->uploadPDF($base64);
        
       
        // $upload = json_decode('{
        //     "object": {
        //         "uuid": "ddbd233b-cd6f-47b3-a888-aee5144bf553",
        //         "puuid": null,
        //         "creationDate": "2022-06-10T17:25:07.141+00:00",
        //         "status": "CREATED",
        //         "digestAlgo": null,
        //         "signingTime": null,
        //         "creator": {
        //             "email": "mohamed.ksibi@etap.com.tn",
        //             "firstName": "Mohamed",
        //             "lastName": "Ksibi",
        //             "phoneNumber": "55277036",
        //             "uuid": "bccf88cf-b88e-44a3-bd3d-b2c27bc591c0",
        //             "roles": [
        //                 "USER"
        //             ],
        //             "status": "CREATED",
        //             "tokensNumber": 9,
        //             "orgTokensNumber": 0,
        //             "customEmails": false,
        //             "sigPreconfigured": true,
        //             "certificate": null,
        //             "digigoCertificate": null,
        //             "serialNumber": null,
        //             "certificateStatus": null,
        //             "manager": false,
        //             "invoice": false,
        //             "organizationName": null,
        //             "registrationDate": "2021-11-08T15:44:34.000+00:00",
        //             "jwt": null,
        //             "apiUser": true,
        //             "usingApi": false,
        //             "ngcertClient": false,
        //             "ngcertManager": false,
        //             "ngcertGuest": null,
        //             "ngcertUser": null,
        //             "completeName": "Mohamed Ksibi"
        //         },
        //         "nextSigner": null,
        //         "parallelSignatures": false,
        //         "byApi": true,
        //         "lockDate": null,
        //         "lockingSigner": null,
        //         "signers": [],
        //         "observers": [],
        //         "pdfs": [
        //             {
        //                 "size": 6685,
        //                 "name": "Demande Conge",
        //                 "extension": "pdf",
        //                 "identifier": "88c174c5-80e5-40eb-894b-a88b15162819",
        //                 "pdfA": false,
        //                 "numberPages": 0
        //             }
        //         ]
        //     },
        //     "message": null,
        //     "errorCode": 0
        // }');


        
        $uuid = $upload->object->uuid;
        $pdfuid = $upload->object->pdfs[0]->identifier;
        
        // return $upload;
        $demandeconge = new Demandeconge;
        $demandeconge->PERS_ID = $request['PERS_ID'];
        $demandeconge->natureconge = $request['natureconge'];
        $demandeconge->debut = $request['debut'];
        $demandeconge->debutX = $request['debutX'];
        $demandeconge->fin = $request['fin'];
        $demandeconge->finx = $request['finx'];
        $demandeconge->adresse = $request['adresse'];
        $demandeconge->tel = $request['tel'];
        $demandeconge->nbrjour = $request->input('nbrjour', $days);
        $demandeconge->pdf = $request->input('pdf', $filename);

        $demandeconge->uuid = $request->input('uuid', $upload->object->uuid);
        $demandeconge->pdfuid = $request->input('pdfuid', $upload->object->pdfs[0]->identifier);

        $demandeconge->save();


        $config = $NgSignService->ConfigPDF($json,$uuid,$pdfuid);

        return ($config);
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
