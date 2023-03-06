<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['color'] - string - contains the car color
     * $this->attributes['kilometers'] - float - contains the car kilometers
     * $this->attributes['price'] - float - contains the car price
     * $this->attributes['isNew'] - bool - contains a boolean indicating if car is new
     * $this->attributes['isAvailable'] - bool - contains a boolean indicating if car is available
     * $this->attributes['isAvailable'] - bool - contains a boolean indicating if car is available
     */
    use HasFactory;

    protected $fillable = ['color', 'kilometers', 'price', 'is_new', 'is_available', 'transmission_type', 'type', 'manufacture_date', 'image_uri'];

    // Validators
    public static function validate(Request $request): void
    {
        $request->validate([
            'color' => 'required',
            'kilometers' => 'required | min: 0 | lt: 320000',
            'price' => 'required | gte:1 ',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getColor(): string
    {
        return $this->attributes['color'];
    }

    public function setColor($color): void
    {
        $this->attributes['color'] = $color;
    }

    public function getKilometers(): float
    {
        return $this->attributes['kilometers'];
    }

    public function setKilometers($kilometers): void
    {
        $this->attributes['kilometers'] = $kilometers;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice($price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getIsNew(): bool
    {
        return $this->attributes['is_new'];
    }

    public function setIsNew($isNew): void
    {
        $this->attributes['is_new'] = $isNew;
    }

    public function getIsAvailable(): bool
    {
        return $this->attributes['is_available'];
    }

    public function setIsAvailable($isAvailable): void
    {
        $this->attributes['is_available'] = $isAvailable;
    }
}
