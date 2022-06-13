<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signataire extends Model
{
    protected $fillable = ['PERS_ID', 'signataire_ID', 'order','tel','nom','prenom'];
    use HasFactory;
}
