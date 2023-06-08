<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailColour extends Model
{
    use HasFactory;

    protected $fillable = [

       
    	'pd_id',
        'c_id',
        'pdc_nm'
    
    ];

    protected $primaryKey = 'pd_id';
    const CREATED_AT = 'pdc_cr_dt';
    const UPDATED_AT = 'pdc_ls_up';

    public function colour()
    {
        return $this->hasOne(Colour::class, 'c_id', 'c_id');
    }
}
