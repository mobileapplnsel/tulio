<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'c_id',
        'c_nm',
        'c_no',
    
    ];

    protected $table = 'colour';

    protected $primaryKey = 'c_id';
    const CREATED_AT = 'c_cr_dt';
    const UPDATED_AT = 'c_up_dt';
}
