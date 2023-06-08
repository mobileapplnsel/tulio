<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectArea extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'pa_id',
        'pa_nm',
        'pa_ds',
    
    ];

    protected $primaryKey = 'pa_id';
    const CREATED_AT = 'pa_cr_dt';
    const UPDATED_AT = 'pa_up_dt';
}
