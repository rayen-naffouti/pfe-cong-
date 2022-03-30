<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use  HasFactory;
    protected $primaryKey = 'PERS_MAT_95';
    protected $fillable = [
        'PERS_MAT_ACT', 
        'PERS_NOM', 
        'PERS_PRENOM', 
        'PERS_DATE_NAIS', 
        'PERS_SEX_X', 
        'PERS_CODE_QUALIF', 
        'PERS_NATURAGENT_93',
        'EMAIL'
    ];
  

    public function absences()
    {
        return $this->hasMany(Personnel::class,'PERS_MAT_95','ABS_NUMORD_93');
    }

    public function natureagent()
    {
        //return $this->belongsTo('App\Natureagent','NATAGENT_CODE_93');
        return $this->belongsTo(Natureagent::class,'PERS_NATURAGENT_93','NATAGENT_CODE_93');
    }
}
