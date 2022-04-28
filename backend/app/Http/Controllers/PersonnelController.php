<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personnel;
use App\Models\Natureagent;

class PersonnelController extends Controller
{
    public function index()
    {
        
         $personnels=Personnel::
            // join('qualifications','personnels.PERS_CODE_QUALIF','qualifications.QUALIF_CODE')
            join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
            ->join('users','personnels.PERS_MAT_95','users.id')
             ->get();
   
         return response()->json($personnels,200);
    }


    public function pers($PERS_MAT_95)
    {
        
         $personnels=Personnel::
            join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
            ->where('personnels.PERS_MAT_95',$PERS_MAT_95)
            ->get();
   
         return response()->json($personnels,200);
    }



    public function abse()
    {
      $personnels=Personnel::
            join('natureagents','personnels.PERS_NATURAGENT_93','natureagents.NATAG_CODE_93')
             ->get();
      $count = array();
           for($i = 1;$i<=count($personnels);$i++)
          {
              $count[]=Personnel::
                   join('absences','personnels.PERS_MAT_95','absences.ABS_NUMORD_93')
                  ->where('personnels.PERS_MAT_95',$i)
                   ->get() 
                   ->count() ;    
           }
         return response()->json($count,200);
    }

    public function show($PERS_MAT_95)
    {
        // $personnels = Absence::where('ABS_NUMORD_93',$PERS_MAT_95)->get();
        // dd($personnels);
        // return view('Personnel.show')->with('personnels', $personnels);
        $personnels=Personnel::
            join('absences','personnels.PERS_MAT_95','ABS_NUMORD_93')
            ->join('natabses','absences.ABS_NAT_9','natabses.CODE_ABS')
            ->where('personnels.PERS_MAT_95',$PERS_MAT_95)
            ->get() ;
                // $count =  $personnels->count();
                // dd($count);
            return  $personnels;
    }
}
