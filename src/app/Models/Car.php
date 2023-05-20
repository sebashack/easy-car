<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class Car extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['car_model_id'] - int - contains the foreign key of the corresponding car model
     * $this->attributes['color'] - string - contains the car color
     * $this->attributes['kilometers'] - float - contains the car kilometers
     * $this->attributes['price'] - float - contains the car price
     * $this->attributes['is_new'] - bool - contains a boolean indicating if car is new
     * $this->attributes['is_available'] - bool - contains a boolean indicating if car is available
     * $this->attributes['image_uri'] - string - contains a string indicating car image
     * $this->attributes['transmission_type'] - enum - contains a enum indicating transmission types
     * $this->attributes['type'] - enum - contains a enum indicating car types
     * $this->attributes['manufacture_year'] - year - contains a year indicating car year
     * $this->attributes['created_at'] - timestamp - contains the timestamp indicating the creation time of the review
     * $this->attributes['updated_at'] - timestamp - contains the timestamp indicating the last update time of the review
     * $this->attributes['car_model_id'] - int - contains the id of the corresponding car model
     * $this->carMdoel - CarModel - contains the associate car model
     * $this->publishRequest - PublishRequest - contains the associate publishRequest
     */
    protected $fillable = ['color', 'kilometers', 'price', 'is_new', 'is_available', 'transmission_type', 'type', 'manufacture_year', 'image_uri', 'car_model_id'];

    protected $attributes = ['is_available' => true];

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function getCarModel(): CarModel
    {
        return $this->carModel;
    }

    public function setCarModelId(int $id): void
    {
        $this->attributes['car_model_id'] = $id;
    }

    public function getCarModelId(): int
    {
        return $this->attribues['car_model_id'];
    }

    public function publishRequest(): HasOne
    {
        return $this->hasOne(PublishRequest::class);
    }

    public function getPublishRequest(): PublishRequest
    {
        return $this->publishRequest;
    }

    public function setPublishRequest(PublishRequest $publishRquest): void
    {
        $this->publishRequest = $publishRequest;
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

    public function setManufactureYear(int $year): void
    {
        $this->attributes['manufacture_year'] = $year;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function carIsVisible(): bool
    {
        if ($this->getIsAvailable()) {
            if ($this->publishRequest !== null && ! ($this->publishRequest->getState() == 'accepted')) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public static function getCarsBySearchParams(?string $state, ?string $brand, ?string $transmission, ?array $priceRange): Collection
    {
        return Car::select('cars.*')->when($state, function (Builder $query, string $state) {
            return $query->where('is_new', $state === 'new');
        })->when($brand, function (Builder $query, string $brand) {
            return $query->join('car_models', 'cars.car_model_id', '=', 'car_models.id')->where('car_models.brand', $brand);
        })->when($transmission, function (Builder $query, string $transmission) {
            return $query->where('transmission_type', $transmission);
        })->when($priceRange, function (Builder $query, array $priceRange) {
            return $query->whereBetween('price', $priceRange);
        })->get();
    }

    public static function getAvailableCars(): Collection
    {
        return Car::select('cars.*')->where('is_available', 1)->get();
    }

    // Validators
    public static function validate(Request $request): void
    {
        $request->validate([
            'color' => 'required',
            'kilometers' => 'required|numeric|min:0|lt:320000',
            'price' => 'required|numeric|gte:1',
            'image_uri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'manufacture_year' => 'required|numeric|min:1900|max:'.(date('Y') + 1),
        ]);
    }

    public static function validateUpdate(Request $request): void
    {
        $request->validate([
            'color' => 'required',
            'kilometers' => 'required|numeric|min:0|lt:320000',
            'price' => 'required|numeric|gte:1',
            'image_uri' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'manufacture_year' => 'required|numeric|min:1900|max:'.(date('Y') + 1),
        ]);
    }
}
