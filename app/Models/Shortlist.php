<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shortlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'colour_id',
        'quantity',
        'length',
        'width',
        'unit',
        'lining_type',
        'mount_type',
        'hardware_type',
        'power_type',
        'control_type',
        'price'
    ];

    /**
     * Get the product that owns the Shortlist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'p_id');
    }

    /**
     * Get the user that owns the Shortlist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'u_id');
    }

    /**
     * Get the colour that owns the Shortlist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colour(): BelongsTo
    {
        return $this->belongsTo(Colour::class, 'colour_id', 'c_id');
    }
}
