<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utm extends Model
{
    use HasFactory;
    protected $table = 'utm';

    protected $fillable = [
        'utm_source',
        'utm_campaign',
        'utm_medium',
        'utm_content',
        'utm_term',
        'utm_device',
    ];
}
