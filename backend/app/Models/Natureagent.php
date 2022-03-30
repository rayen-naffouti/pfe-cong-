<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natureagent extends Model
{
    protected $primaryKey = 'NATAG_CODE_93';
    use HasFactory;
   
    public function personnels()
    {
        return $this->hasMany(Personnel::class,'PERS_MAT_95');
    }
}
