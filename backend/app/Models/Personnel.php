<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use  HasFactory;
    protected $primaryKey = 'PERS_MAT_95';
    protected $fillable = ['PERS_MAT_ACT', 'PERS_NOM', 'PERS_PRENOM', 'PERS_DATE_NAIS', 'PERS_SEX_X', 'PERS_CODE_QUALIF', 'PERS_NATURAGENT_93'];
  
}
