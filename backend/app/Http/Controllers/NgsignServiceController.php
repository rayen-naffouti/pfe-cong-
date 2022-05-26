<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NgsignServiceController extends Controller
{
    
    public function fetch(){
        $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzNTUzNTYxfQ.17qUa1IB_FFEr9izBWe0fK-Vtkmp_6RHWxvsIZZi6WttshZBb0g9NDhUtl69qb_v83lBCfxEqSrRCMaIuYjBQg';


        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/57154aa9-43c3-4c0c-9ab0-e3eeecc92bc4/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
             ]
        ]);
        $data = json_decode($response->getBody());
        // dd($response);
        return($data); 
        

        // $test = '{
        //     "object": [
        //         {
        //             "uuid": "ac22735e-ab7d-44a9-bf3f-834f7a2ab325",
        //             "puuid": null,
        //             "creationDate": "2021-11-16T15:12:44.000+00:00",
        //             "status": "CREATED",
        //             "digestAlgo": null,
        //             "signingTime": null,
        //             "creator": {
        //                 "email": "mohamed.ksibi@etap.com.tn",
        //                 "firstName": "Mohamed",
        //                 "lastName": "Ksibi",
        //                 "phoneNumber": "55277036",
        //                 "uuid": "bccf88cf-b88e-44a3-bd3d-b2c27bc591c0",
        //                 "roles": [
        //                     "USER"
        //                 ],
        //                 "status": "CREATED",
        //                 "tokensNumber": 10,
        //                 "orgTokensNumber": 0,
        //                 "customEmails": false,
        //                 "sigPreconfigured": true,
        //                 "certificate": null,
        //                 "digigoCertificate": null,
        //                 "serialNumber": null,
        //                 "certificateStatus": null,
        //                 "manager": false,
        //                 "invoice": false,
        //                 "organizationName": null,
        //                 "registrationDate": "2021-11-08T15:44:34.000+00:00",
        //                 "jwt": null,
        //                 "apiUser": true,
        //                 "usingApi": false,
        //                 "ngcertClient": false,
        //                 "ngcertManager": false,
        //                 "ngcertGuest": null,
        //                 "ngcertUser": null,
        //                 "completeName": "Mohamed Ksibi"
        //             },
        //             "nextSigner": null,
        //             "parallelSignatures": false,
        //             "byApi": false,
        //             "lockDate": null,
        //             "lockingSigner": null,
        //             "signers": [],
        //             "observers": [],
        //             "pdfs": [
        //                 {
        //                     "size": 842187,
        //                     "name": "Fiche d evaluation du stagiaire",
        //                     "extension": "pdf",
        //                     "identifier": "fd237eeb-24d8-4fd7-aebc-60edc1c8916a",
        //                     "pdfA": false,
        //                     "numberPages": 0
        //                 }
        //             ]
        //         }
        //     ],
        //     "message": null,
        //     "errorCode": 0
        // }';

        // return(json_decode($test)); 


        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        // $data = json_decode($response->body());
        // return($response);
    }
    

    public function post(){
        $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzNTUzNTYxfQ.17qUa1IB_FFEr9izBWe0fK-Vtkmp_6RHWxvsIZZi6WttshZBb0g9NDhUtl69qb_v83lBCfxEqSrRCMaIuYjBQg';


        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('POST', 'https://app.ng-sign.com.tn/server/any/transaction/5914fb69-ee9c-406d-ab33-5bab15fb67dd/', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
             ]
        ]);
        
        // dd($response);
        return($data); 
        

       
    }
   
        
}



