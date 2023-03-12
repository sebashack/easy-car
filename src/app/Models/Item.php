<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int
     * $this->attributes['price_to_date'] - int
     * $this->order - Order - assosicated order
     * $this->car - Car - assosicated car
     */
    protected $fillable = ['price_to_date'];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCar(): Car
    {
        return $this->car;
    }

    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    public function getPriceToDate(): int
    {
        return $this->attributes['price_to_date'];
    }

    public function setPriceToDate(int $price): void
    {
        $this->attributes['price_to_date'] = $price;
    }
}
