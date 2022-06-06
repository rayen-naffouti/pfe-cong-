<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\Service\NgSignService;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Demandeconge extends Model
{
    protected $primaryKey = 'id';
   
    use HasFactory;
    protected $fillable = [
        'PERS_ID', 
        'natureconge', 
        'debut', 
        'debutX', 
        'fin', 
        'finx', 
        'adresse',
        'tel',
        'nbrjour',
        'pdf'
    ];
    // public static function sendDemandeconge($demandeconge){
    //     $viewData['debut'] = $demandeconge->debut;
    //     $viewData['debutX'] = $demandeconge->debutX;
    //     $viewData['fin'] = $demandeconge->fin;
    //     $viewData['finx'] = $demandeconge->finx;

    //     Mail::send('email_templates.email_demandeconge', $viewData, function($message) use($demandeconge)
    //     {
    //         $message->from('naffoutirayen11@gmail.com', env('APP_NAME'));
    //         $message->to('')->subject($demandeconge->PERS_ID);
    //     });
    // }

    protected function ngsign():Attribute {
        $NgSignService=new NgSignService();
        return Attribute::make(
            get: function () use($NgSignService) {
                return $NgSignService->gettransaction($this->uuid);
            }
        );
    }
}
