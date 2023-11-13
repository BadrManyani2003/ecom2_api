<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'stripe_user_id',
        'first_name', 'last_name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'deleted_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user may have multiple billing addresses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAddress()
    {
        return $this->hasMany(UserAddress::class)
            ->where('type', UserAddress::BILLING);
    }

    /**
     * A user may have multiple shipping addresses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingAddress()
    {
        return $this->hasMany(UserAddress::class)
            ->where('type', UserAddress::SHIPPING);
    }

    /**
     * A user may have multiple products in their wishlist.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productWishlist()
    {
        return $this->hasMany(ProductWishlist::class);
    }
}
