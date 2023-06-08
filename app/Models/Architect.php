<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architect extends Model
{
    use HasFactory;
    protected $fillable = [

        'a_id',
        'a_nm',
        'a_em',
        'a_pw',
        'a_ph',
        'a_or',
        'a_a1',
        'a_a2',
        'a_ct',
        'a_st',
        'a_co',
 
    ];

    protected $primaryKey = 'a_id';
    const CREATED_AT = 'a_cr_dt';
    const UPDATED_AT = 'a_up_dt';

}
