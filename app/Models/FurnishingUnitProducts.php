<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnishingUnitProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'fp_id',
        'fu_id',
        'pd_id'
    
    ];

    protected $primaryKey = 'fp_id';
    const CREATED_AT = 'fp_cr_dt';
    const UPDATED_AT = 'fp_up_dt';
}
