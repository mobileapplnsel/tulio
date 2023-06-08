<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailFabric extends Model
{
    use HasFactory;

    protected $fillable = [

        'pdf_id',
    	'pd_id',
        'fb_cd',
        'pdf_fw',
        'pdf_pct',
        'pdf_rt',
    
    ];

    protected $primaryKey = 'pdf_id';
    const CREATED_AT = 'pdf_cr_dt';
    const UPDATED_AT = 'pdf_up_dt';
}
