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
     * $this->attributes['manudacture_date'] - year - contains a year indicating car year
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

    public function setIsNew($is_new): void
    {
        $this->attributes['is_new'] = $is_new;
    }

    public function getIsAvailable(): bool
    {
        return $this->attributes['is_available'];
    }

    public function setIsAvailable($is_available): void
    {
        $this->attributes['is_available'] = $is_available;
    }

    public function getImageUri(): string
     {
        return $this->attributes['image_uri'];
    }

    public function setImageUri($image_uri): void
    {
        $this->attributes['image_uri'] = $image_uri;
    }

    public function getTransmissionType(): string
    {
        return $this->attributes['transmission_type'];
    }

    public function setTransmissionType($transmission_type): void
    {
        $this->attributes['transmission_type'] = $transmission_type;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType($type): void
     {
        $this->attributes['type'] = $type;
    }

    public function getManufactureDate()
    {
        return $this->attributes['manufacture_date'];
    }

    public function setManufactureDate($manufacture_date): void
    {
        $this->attributes['manufacture_date'] = $manufacture_date;
    }
}
