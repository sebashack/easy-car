<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['car_model_id'] - int - contains the foreign key of the corresponding car model
     * $this->attributes['color'] - string - contains the car color
     * $this->attributes['kilometers'] - float - contains the car kilometers
     * $this->attributes['price'] - float - contains the car price
     * $this->attributes['isNew'] - bool - contains a boolean indicating if car is new
     * $this->attributes['isAvailable'] - bool - contains a boolean indicating if car is available
     * $this->attributes['isAvailable'] - bool - contains a boolean indicating if car is available
     * $this->carModel - CarModel - contains the associated car model
     */
    use HasFactory;

    protected $fillable = ['color', 'kilometers', 'price', 'isNew', 'isAvailable','car_model_id'];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function getCarModelId(): int 
    {
        return $this->attribues['car_model_id'];
    }

    public function getCarModel(): CarModel 
    {
        return $this->carModel;
    }

    public function setCarModel(CarModel $carModel): void 
    {
        $this->carModel = $carModel;
    }

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
        return $this->attributes['isNew'];
    }

    public function setIsNew($isNew): void
    {
        $this->attributes['isNew'] = $isNew;
    }

    public function getIsAvailable(): bool
    {
        return $this->attributes['isAvailable'];
    }

    public function setIsAvailable($isAvailable): void
    {
        $this->attributes['isAvailable'] = $isAvailable;
    }
}
