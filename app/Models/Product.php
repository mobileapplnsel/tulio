<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
    	'p_id',
    	'cat_id',
    	'p_cd',
      'slug',
    	'p_img1',
    	'p_img2',
      'p_img3',
      'p_img4',
    	'p_img5',
      'p_img6',
      'p_img7',
      'category_id',
      'featured',
    ];

    protected $table = 'product';
    protected $primaryKey = 'p_id';
    const CREATED_AT = 'p_cr_dt';
    const UPDATED_AT = 'p_up_dt';

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['p_cd'])
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(100);
    }

    /**
     * Get the detail associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail(): HasOne
    {
        return $this->hasOne(ProductDetail::class, 'p_id', 'p_id');
    }

    /**
     * Get all of the images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id','p_id');
    }

    /**
     * Get the image associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(ProductImage::class, 'product_id','p_id')->where('type','closeup');
    }

    /**
     * Get the fabric associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fabric()
    {
        return $this->hasOneThrough(ProductDetailFabric::class, ProductDetail::class, 'p_id', 'pd_id', 'p_id', 'pd_id');
    }

    /**
     * Get the colours associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colours()
    {
        return $this->hasManyThrough(ProductDetailColour::class, ProductDetail::class, 'p_id', 'pd_id', 'p_id', 'pd_id');
    }

    /**
     * Get the category associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id', 'cat_id');
    }


    public function getImageUrlAttribute()
    {
        return $this->image?$this->image->image_url:asset('assets/no-image.svg');
    }

    public function getImageThumbAttribute()
    {
        return $this->image?$this->image->image_thumb_url:asset('assets/no-image.svg');
    }

    public function getFrontImageAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'front')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'front')->first();
      if($image){
        return $image->image_url;
      }
      return asset('assets/no-image.svg');
    }

    public function getFrontImageThumbAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'front')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'front')->first();
      if($image){
        return $image->image_thumb_url;
      }
      return asset('assets/no-image.svg');
    }

    public function getAngleImageAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'angle')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'angle')->first();
      if($image){
        return $image->image_url;
      }
      return asset('assets/no-image.svg');
    }

    public function getAngleImageThumbAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'angle')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'angle')->first();
      if($image){
        return $image->image_thumb_url;
      }
      return asset('assets/no-image.svg');
    }

    public function getCloseupImageAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'closeup')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'closeup')->first();
      if($image){
        return $image->image_url;
      }
      return asset('assets/no-image.svg');
    }

    public function getCloseupImageThumbAttribute()
    {
      if($this->color)
        $image = $this->images->where('type', '=', 'closeup')->where('color',$this->color)->first();
      else
        $image = $this->images->where('type', '=', 'closeup')->first();
      if($image){
        return $image->image_thumb_url;
      }
      return asset('assets/no-image.svg');
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
}
