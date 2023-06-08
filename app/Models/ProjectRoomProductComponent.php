<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRoomProductComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_room_product_id',
        'name',
        'quantity',
        'unit',
        'price',
    ];
}
