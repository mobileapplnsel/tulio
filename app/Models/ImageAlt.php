<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageAlt extends Model
{
    use HasFactory;
    protected $table = 'temp_image';

    protected $fillable = [
        'product_image_id',
        'image',
        'alt',
    ];
}
