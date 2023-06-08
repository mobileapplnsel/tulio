<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'poc_name',
        'poc_number',
        'last_name',
        'company_studio_name',
        'size',
        'phone_number',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeCustomer($query)
    {
        return $query->where('user_type', 1);
    }

    public function scopeDesigner($query)
    {
        return $query->where('user_type', 2);
    }

    public function scopeArchitect($query)
    {
        return $query->where('user_type', 3);
    }

    public function scopeAdmin($query)
    {
        return $query->where('user_type', 4);
    }

    /**
     * Get all of the wishlists for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'u_id');
    }

    /**
     * Get all of the shortlists for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shortlists(): HasMany
    {
        return $this->hasMany(Shortlist::class, 'user_id');
    }

    /**
     * Get all of the projects for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all of the assign_projects for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assign_projects(): HasMany
    {
        return $this->hasMany(Project::class, 'assign_user_id');
    }

    public function getUserTypeTextAttribute()
    {
        if($this->user_type==4)
            return 'Tulio';
        if($this->user_type==3)
            return 'Architect';
        return 'Designer';
    }
    
}
