<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'e_id',
        'e_nm',
        'e_un',
        'e_pw',
    
    ];

    protected $primaryKey = 'e_id';
    const CREATED_AT = 'e_cr_dt';
    const UPDATED_AT = 'e_up_dt';
}
