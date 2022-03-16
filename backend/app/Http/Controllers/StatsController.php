<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Personnel;

use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        
        $personnels=DB::table('personnels')->get();
        $homme=0;
        $femme=0;
        for($i = 0;$i<count($personnels);$i++)
        {
                if ($personnels[$i]->PERS_SEX_X == 'H') {
                    $homme += 1;
                } 
        }
        $sum = count($personnels);
        $homme = ($homme * 100) /  $sum ;
        $femme = 100 -  $homme ;


        $ldate = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));

        $absence=DB::table('absences')
            ->where('ABS_DATE_DEB', '<=', $ldate )
            ->where('ABS_DATE_FIN', '>=', $ldate )
            ->get();
        $absence2=DB::table('absences')
            ->where('ABS_DATE_DEB', '<=', $yesterday )
            ->where('ABS_DATE_DEB', '>=', $yesterday )
            ->get();
        $absence=count($absence);
        $absence2=count($absence2);

        $perabsence = $absence * 100 / $sum;
        $perabsence2 = $absence2 * 100 / $sum;
        $json = array();
        $json = [
            'homme' => round($homme),
            'femme' => round($femme),
            'sum' => $sum,
            'absence' => $absence,
            'absence2' => $absence2,
            'perabsence' => round($perabsence),
            'perabsence2' => round($perabsence2)
        ];
    return response()->json($json,200);
        // ->with('homme', $homme)
        // ->with('femme', $femme)
        // ->with('sum', $sum)
        // ->with('absence', $absence)
        // ->with('absence2', $absence2)
        // ->with('perabsence', $perabsence)
        // ->with('perabsence2', $perabsence2);

    }
}
