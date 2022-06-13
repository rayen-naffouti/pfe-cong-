<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class NgSignService
{
    public function gettransaction($uuid){
            
        // $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';
        $token = env('NGSIGN_TOKEN');
        $url = env('NGSIGN_URL');
        // dd($url);

        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('GET', $url. '/'.$uuid, [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
             ]
        ]);
        $data = json_decode($response->getBody());
        // dd($response);
        return($data); 
        

    }

    
    public function getPdfs($uuid,$pdfuid){
        

        return response()->streamDownload(function () use ($uuid, $pdfuid) {
       //'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';
       $token = env('NGSIGN_TOKEN');
       $url = env('NGSIGN_URL');

        $client = new \GuzzleHttp\Client(['verify' => false]);
        echo $response = $client->request('GET', $url. '/' .$uuid. '/pdfs/' .$pdfuid, [
        
        // echo $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction''/pdfs/'.$pdfuid, [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/pdf',
             ]
        ])->getBody();
        // $data = $response;
        }, 'Demande.pdf');
       
    }


    public function uploadPDF($pdf){
        

        $token = env('NGSIGN_TOKEN');
        //  dd($pdf);

        $client = new \GuzzleHttp\Client(['verify' => false,
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/json',
             ]
            ]);
        $data = [
            'body' => '['.json_encode([
                'fileName' => 'Demande Conge',
                'fileExtension' => 'pdf',
                'fileBase64' => $pdf
            ]).']'];

            // dd($data);
        $response = $client->request('POST', 'https://app.ng-sign.com.tn/server/protected/transaction/pdfs/',  $data
        
        );
        $data = json_decode($response->getBody()->getContents());
        // dd($response);
        return($data); 
       
    }


    public function ConfigPDF($signers, $uuid,$pdfuid){
        // return($signers);
        

        $token = env('NGSIGN_TOKEN');

        $client = new \GuzzleHttp\Client(['verify' => false , 
        'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
         ]]);

        //  $data = [
        //     'body' => '['.json_encode([
        //         'fileName' => 'Demande Conge',
        //         'fileExtension' => 'pdf',
        //         'fileBase64' => $pdf
        //     ]).']'];

        $data = [
            'body' => json_encode([
                "sigConf" =>
                [
                    [
                    "signer"=> $signers,
                    "sigType" => "CERTIFIED_TIMESTAMP",
                    "docsConfigs" =>
                        [
                            [
                            "page" => 1,
                            "xAxis" => 81,
                            "yAxis" => 44.28125,
                            "documentName" => "NoteInterne",
                            "documentExtension" => "pdf",
                            "identifier" => $pdfuid
                            ],
                        ],
                    "mode" => "FACE_TO_FACE",
                    "otp" => "NONE"
                    ]
                ], 
                    "message" => "This is a message included in the e-mail invitation that will be sent to all signatories."
            ])];

           


            // return($data);
        $response = $client->request('POST', 'https://app.ng-sign.com.tn/server/protected/transaction/'.$uuid.'/launch',  $data
        
        );
        $conf = json_decode($response->getBody()->getContents());

                
        // $response = $client->request('POST', 'https://app.ng-sign.com.tn/server/protected/transaction/'.$uuid.'/launch', $data);
        // $conf = json_decode($response->getBody());
        // dd($response);
        return($conf); 
       
    }
}