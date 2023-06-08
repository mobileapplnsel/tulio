<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapProductDetailColour extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'c_id',
        'pd_id',
    
    ];

    protected $primaryKey = 'c_id';
    const CREATED_AT = 'mpdc_cr_dt';
    const UPDATED_AT = 'mpdc_up_dt';
}
