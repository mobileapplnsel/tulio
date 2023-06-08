<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [

        'b_id',
        'b_nm',
    
    ];

    protected $primaryKey = 'b_id';
    const CREATED_AT = 'b_cr_dt';
    const UPDATED_AT = 'b_up_dt';
}
