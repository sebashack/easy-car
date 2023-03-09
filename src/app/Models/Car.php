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
     * $this->attributes['is_new'] - bool - contains a boolean indicating if car is new
     * $this->attributes['is_available'] - bool - contains a boolean indicating if car is available
     * $this->attributes['image_uri'] - string - contains a string indicating car image
     * $this->attributes['transmission_type'] - enum - contains a enum indicating transmission types
     * $this->attributes['type'] - enum - contains a enum indicating car types
     * $this->attributes['manudacture_year'] - year - contains a year indicating car year
     */
    use HasFactory;

    protected $fillable = ['color', 'kilometers', 'price', 'is_new', 'is_available', 'transmission_type', 'type', 'manufacture_year', 'image_uri'];

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

    public function setColor(string $color): void
    {
        $this->attributes['color'] = $color;
    }

    public function getKilometers(): float
    {
        return $this->attributes['kilometers'];
    }

    public function setKilometers(float $kilometers): void
    {
        $this->attributes['kilometers'] = $kilometers;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getIsNew(): bool
    {
        return $this->attributes['is_new'];
    }

    public function setIsNew(bool $is_new): void
    {
        $this->attributes['is_new'] = $is_new;
    }

    public function getIsAvailable(): bool
    {
        return $this->attributes['is_available'];
    }

    public function setIsAvailable(bool $is_available): void
    {
        $this->attributes['is_available'] = $is_available;
    }

    public function getImageUri(): string
    {
        return $this->attributes['image_uri'];
    }

    public function setImageUri(string $image_uri): void
    {
        $this->attributes['image_uri'] = $image_uri;
    }

    public function getTransmissionType(): string
    {
        return $this->attributes['transmission_type'];
    }

    public function setTransmissionType(string $transmission_type): void
    {
        $this->attributes['transmission_type'] = $transmission_type;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getManufactureYear(): int
    {
        return $this->attributes['manufacture_year'];
    }

    public function setManufactureDate(int $manufacture_year): void
    {
        $this->attributes['manufacture_year'] = $manufacture_year;
    }
}
