<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertainHardware extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'ch_id',
        'ch_typ',
        'ch_cd',
        'ch_wt',
        'ch_rt',
        '',
    
    ];

    protected $primaryKey = 'ch_id';
    const CREATED_AT = 'ch_cr_dt';
    const UPDATED_AT = 'ch_ls_up';
}
