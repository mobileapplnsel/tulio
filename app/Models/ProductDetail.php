<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
    	'pd_id',
    	'p_id',
    	'pd_sc',
    	'pd_nm',
    	'pd_ds',
        'pd_ts',
        'pd_tq',
    	'pd_am',
        'pd_de',
        'pd_kw',        
        'pd_pr',
    
    ];
    protected $table = 'product_detail';
    protected $primaryKey = 'pd_id';
    const CREATED_AT = 'pd_cr_dt';

    protected $casts = [
        'pd_tq' => 'array',
        'pd_am' => 'array',
        'pd_de' => 'array',
    ];
    
    /**
     * Get all of the colours for the ProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colours(): HasMany
    {
        return $this->hasMany(ProductDetailColour::class, 'pd_id', 'pd_id');
    }

    /**
     * Get all of the fabrics for the ProductDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fabric(): HasOne
    {
        return $this->hasOne(ProductDetailFabric::class, 'pd_id', 'pd_id');
    }
}
