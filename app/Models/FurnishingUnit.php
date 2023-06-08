<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnishingUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'fu_id',
        'pa_id',
        'fu_nm',
        'fu_ds',
        'fu_l',
        'fu_w',
    
    ];

    protected $primaryKey = 'fu_id';
    const CREATED_AT = 'fu_cr_dt';
    const UPDATED_AT = 'fu_up_dt';
}
