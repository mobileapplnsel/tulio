<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature_Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'products',
     ];
     protected $casts = [
        'products' => 'array',
    ];
    
}