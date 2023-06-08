<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color',
        'type',
        'image'
    ];

    public function getImageUrlAttribute()
    {
        return asset($this->image);
    }

    public function getImageThumbUrlAttribute()
    {
        $name = str_replace('products',"products/thumb" ,$this->image);
        if(file_exists(public_path($name))){
            return asset($name);
        }
        try {
          (new ImageManager)->make(public_path($this->image))->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
          })->save(public_path($name));
        } catch (\Exception $e) {
          
        }


        return asset($name);
    }
}
