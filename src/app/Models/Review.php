<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['content'] - string - contains the review's text content
     * $this->attributes['rating'] - int - contains the car model's numeric rating (from 1 to 5)
     * $this->attributes['car_model_id'] - int - contains the foreign key of the corresponding car model
     * $this->attributes['user_id'] - int - contains the foreign key of the corresponding user
     * $this->carModel - CarModel - contains the associated car model
     */
    protected $fillable = ['content', 'rating','car_model_id', 'user_id'];

    //Relation with CarModel
    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function setCarModel(CarModel $carModel): void 
    {
        $this->carModel = $carModel;
    }

    public function getCarModel(): CarModel 
    {
        return $this->carModel;
    }

    public function getCarModelId(): int 
    {
        return $this->attribues['car_model_id'];
    }

    // Relation with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getUserId(): int 
    {
        return $this->attributes['user_id'];
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getContent(): string
    {
        return $this->attributes['content'];
    }

    public function setContent($content): void
    {
        $this->attributes['content'] = $content;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    // Validators
    public static function validate(Request $request): void
    {
        $request->validate([
            'content' => 'required|min:3|max:650',
            'rating' => 'required|gte:1|lte:5',
        ]);
    }
}
