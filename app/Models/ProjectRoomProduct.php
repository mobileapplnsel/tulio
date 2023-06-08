<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectRoomProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_room_id',
        'product_id',
        'color_id',
        'color',
        'quantity',
        'length',
        'width',
        'lining_type',
        'mount_type',
        'hardware_type',
        'power_type',
        'control_type',
        'price',
        'name',
        'tax',
        'total',
        'sort_order',
        'unit'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('sort', function (Builder $builder) {
            $builder->orderBy('sort_order');
        });
    }

    /**
     * Get the project room that owns the ProjectRoomProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(ProjectRoom::class,'project_room_id');
    }

    /**
     * Get the product that owns the ProjectRoomProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function colour(): BelongsTo
    {
        return $this->belongsTo(Colour::class, 'color_id');
    }
    
    /**
     * Get all of the components for the ProjectRoomProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components(): HasMany
    {
        return $this->hasMany(ProjectRoomProductComponent::class);
    }
}
