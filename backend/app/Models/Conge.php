<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $primaryKey = 'CONG_MAT_95';
    protected $fillable = ['CONG_NUMORD_93', 'CONG_NAT_9', 'CONG_MOTIF_X40', 'CONG_CET_9', 'CONG_ANCSOLD_93', 'CONG_NBRJOUR_93', 'CONG_NOVSOLD_93', 'CONG_DATE_DEB', 'CONG_PERDEB_X', 'CONG_DATE_FIN', 'CONG_PERFIN_X', 'CONG_INTERIM_X20', 'CONG_ADRES_X30', 'CONG_TEL_98', 'CONG_DEMI_PER'];
    use HasFactory;
}
