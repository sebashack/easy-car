<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int
     * $this->attributes['shipping_address'] - string
     * $this->attributes['user_id'] - string - associated user
     * $this->attributes['total'] - int - total price
     * $this->items - Item[] - assosicated items
     */
    protected $fillable = ['shipping_address', 'total', 'user_id'];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getShippingAddress(): string
    {
        return $this->attributes['shipping_address'];
    }

    public function setShippingAddress(string $addr): void
    {
        $this->attributes['shipping_address'] = $addr;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $addr;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    // Validators
    public static function validate(Request $request): void
    {
        $request->validate([
            'shipping_address' => 'required|min:1|max:300',
        ]);
    }
}
