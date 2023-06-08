<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory,HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'cat_id',
        'parent_id',
        'cat_nm',
        'slug',
        'cat_ds',
        'cat_img1',
    ];

    protected $table = 'category';

    protected $primaryKey = 'cat_id';
    const CREATED_AT = 'cat_cr_dt';
    const UPDATED_AT = 'cat_up_dt';

    public function scopeRoot($query)
    {
        return $query->where('parent_id', 0);
    }

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('cat_nm')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(100);
    }

    public function getImageUrlAttribute()
    {
        return url('uploads/'.$this->cat_img1);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'cat_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'cat_id');
    }

    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'cat_id');
    }
}
