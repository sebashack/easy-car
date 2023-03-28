<?php

namespace App\Models;

use  Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarModel extends Model
{
    /**
     * CAR MODEL ATTRIBUTES
     * $this->attributes['id'] - int - contains the car model primary key (id)
     * $this->attributes['brand'] - string - contains the car brand
     * $this->attributes['model'] - string - contains the car model
     * $this->attributes['description'] - string - contains the car description
     * $this->cars - Car[] - contains the associated cars
     * $this->cars - Review[] - contains the associated reviews
     */
    protected $fillable = ['brand', 'model', 'description'];

    // Relation with Car

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
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

    public static function getBestRatingCarModels(): Collection
    {
        $carModels = CarModel::withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->limit(5)
                ->get();

        return $carModels;
    }

    public static function getMostSoldCarModels(): Collection
    {
        $carModels = CarModel::select('car_models.*', DB::raw('count(*) as total_sold'))
        ->join('cars', 'car_models.id', '=', 'cars.car_model_id')
        ->join('items', 'cars.id', '=', 'items.car_id')
        ->join('orders', 'items.order_id', '=', 'orders.id')
        ->groupBy('car_models.id')
        ->orderBy('total_sold', 'desc')
        ->limit(5)
        ->get();

        return $carModels;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'model' => 'required|min:1|max:60',
            'brand' => 'required|min:1|max:60',
            'description' => 'required|min:3|max:670',
        ]);
    }
}
