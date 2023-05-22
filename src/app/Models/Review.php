<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['content'] - string - contains the review's text content
     * $this->attributes['rating'] - int - contains the car model's numeric rating (from 1 to 5)
     * $this->attributes['car_model_id'] - int - contains the foreign key of the corresponding car model
     * $this->attributes['user_id'] - int - contains the foreign key of the corresponding user
     * $this->attributes['created_at'] - timestamp - contains the timestamp indicating the creation time of the review
     * $this->attributes['updated_at'] - timestamp - contains the timestamp indicating the last update time of the review
     */
    protected $fillable = ['content', 'rating', 'car_model_id', 'user_id'];

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

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public static function getReviewsByUserId(int $userId, int $perPage): LengthAwarePaginator
    {
        return Review::select('reviews.*')
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->where('users.id', $userId)
                ->orderBy('reviews.rating')
                ->paginate($perPage);
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
