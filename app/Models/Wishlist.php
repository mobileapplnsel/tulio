<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [        
        'u_id',
        'p_id',    
    ];

    protected $table = 'wishlist';
    const CREATED_AT = 'w_cr_dt';
    const UPDATED_AT = 'w_up_dt';
}
