<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandeconge;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Service\NgSignService;
use App\Service\NgSignServiceInterface;

class NgsignServiceController extends Controller
{
    // public $token = 'test';
    
    public function fetch($uuid, NgSignService $NgSignService){
        // // 5914fb69-ee9c-406d-ab33-5bab15fb67dd/
        // // dd($uuid);
        // $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';


        // $client = new \GuzzleHttp\Client(['verify' => false]);
        // $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/'.$uuid, [
        //     'headers' => [
        //         'Authorization' => 'Bearer '.$token,
        //         'Accept' => 'application/json',
        //      ]
        // ]);
        // $data = json_decode($response->getBody());
        // // dd($response);
        // return($data); 


        return $NgSignService->gettransaction($uuid);
        

    }

    public function alltransaction(){
        $Demandeconge=Demandeconge::get();
        foreach($Demandeconge as $v){
 
            echo $v['uuid'];
        };
       
        return ($Demandeconge);
        

    }
    

    public function getPdfs($uuid,$pdfuid, NgSignService $NgSignService){
        

    //     return response()->streamDownload(function () use ($uuid, $pdfuid) {
    //     $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJtb2hhbWVkLmtzaWJpQGV0YXAuY29tLnRuIiwiaWF0IjoxNjUzODk5MTA3fQ.P6l8oAu8OyUr_jFpOoFplJ-vtdlEmrc_2Qxd4jfw4WLOrQnklPPpuTBNSs9-BcBFEflpjjlXDy3i6N5M3ebFeQ';


    //     $client = new \GuzzleHttp\Client(['verify' => false]);
    //     echo $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction/'.$uuid. '/pdfs/'.$pdfuid, [
        
    //     // echo $response = $client->request('GET', 'https://app.ng-sign.com.tn/server/any/transaction''/pdfs/'.$pdfuid, [
    //         'headers' => [
    //             'Authorization' => 'Bearer '.$token,
    //             'Accept' => 'application/pdf',
    //          ]
    //     ])->getBody();
    //     // $data = $response;
    //     }, 'laravel.pdf');
       
        
    return $NgSignService->getPdfs($uuid,$pdfuid);
       
    }
   
   
        
}



