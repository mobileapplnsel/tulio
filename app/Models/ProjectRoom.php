<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id','room_id','name', 'budget','sort_order'
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
     * Get the project that owns the ProjectRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all of the options for the ProjectRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(ProjectRoom::class,'room_id');
    }

    /**
     * Get all of the products for the ProjectRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(ProjectRoomProduct::class);
    }

    /**
     * Get the parent that owns the ProjectRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProjectRoom::class,'room_id');
    }
    
    /**
     * Get all of the comments for the ProjectRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
