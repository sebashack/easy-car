<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    /**
     * CAR MODEL ATTRIBUTES
     * $this->attributes['id'] - int - contains the car model primary key (id)
     * $this->attributes['brand'] - string - contains the car brand
     * $this->attributes['model'] - string - contains the car model
     * $this->attributes['description'] - string - contains the car description
     * $this->cars - Car[] - contains the associated cars
     */
    protected $fillable = ['brand', 'model', 'description'];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function getCars(): Collection 
    {
        return $this->cars;
    }

    public function setCars(Collection $cars): void 
    {
        $this->cars = $cars;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getModel(): string
    {
        return $this->attributes['model'];
    }

    public function setModel(string $model): void
    {
        $this->attributes['model'] = $model;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'model' => 'required|min:1|max:20',
            'brand' => 'required|min:1|max:20',
            'description' => 'required|min:3|max:670',
        ]);
    }
}
