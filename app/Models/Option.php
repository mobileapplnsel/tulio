<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'op_id',
        'pa_id',
        'op_nm',
        'op_ds',
        'op_pr',
        'op_flag',
    
    ];

    protected $primaryKey = 'op_id';
    const CREATED_AT = 'op_cr_dt';
    const UPDATED_AT = 'op_up_dt';
}
