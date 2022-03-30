<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natabse extends Model
{
    protected $primaryKey = 'CODE_ABS';
    use HasFactory;
    public function absences()
    {
        return $this->hasMany(Absence::class,'ABS_MAT_95');
    }
}
