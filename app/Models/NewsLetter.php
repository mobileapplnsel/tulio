<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'type',
        'name',
        'email',
        'phone',
        'news_letter', 
    ];

    protected $table = 'news_letters';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';

    public function getNewsLetterTextAttribute()
    {
        return $this->news_letter?'Yes':'No';
    }
}
