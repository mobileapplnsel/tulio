<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectShortlist extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'ps_id',
        'a_id',
        'p_id',
        'pa_id',
    
    ];

    protected $primaryKey = 'ps_id';
    const CREATED_AT = 'ps_cr_dt';
    const UPDATED_AT = 'ps_up_dt';
}
