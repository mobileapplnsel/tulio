<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareManual extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'hwmn_id',
        'hwmn_nm',
        'hwmn_rt'
    
    ];

    protected $primaryKey = 'hwmn_id';
    const CREATED_AT = 'hwmn_cr_dt';
}
