<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int
     * $this->attributes['price_to_date'] - int
     * $this->attributes['order_id'] - int - associated order
     * $this->attributes['car_id'] - int - associated car
     * $this->attributes['created_at'] - timestamp - contains the timestamp indicating the creation time of the review
     * $this->attributes['updated_at'] - timestamp - contains the timestamp indicating the last update time of the review
     */
    protected $fillable = ['price_to_date', 'car_id'];

    public function car(): BelongsTo
    {
        return $this->BelongsTo(Car::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function getPriceToDate(): int
    {
        return $this->attributes['price_to_date'];
    }

    public function setPriceToDate(int $price): void
    {
        $this->attributes['price_to_date'] = $price;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }
}
