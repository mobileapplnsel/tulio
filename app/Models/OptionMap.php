<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionMap extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'op_id',
        'fp_id',
    
    ];

    protected $primaryKey = 'op_id';
    
}
