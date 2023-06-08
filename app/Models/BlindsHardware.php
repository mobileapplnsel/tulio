<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlindsHardware extends Model
{
    use HasFactory;

    protected $fillable = [

        'bh_id',
        'bh_typ',
        'bh_cd',
        'bh_wt',
        'bh_rt',
    
    ];

    protected $primaryKey = 'bh_id';
    const CREATED_AT = 'bh_cr_dt';
    const UPDATED_AT = 'bh_up_dt';
}
