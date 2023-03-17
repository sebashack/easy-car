<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PublishRequest extends Model
{
    /**
     * PUBLISHREQUEST ATTRIBUTES
     * $this->attributes['id'] - int - contains the publishRquest primary key (id)
     * $this->attributes['message'] - string - contains the request message
     * $this->attributes['state'] - enum[Pending, Accepted, Rejected] - contains the request state
     * $this->attributes['carId'] - int - contains the car foreign key (id) associeted
     * $this->attributes['user_id'] - int - contains the foreign key of the corresponding user
     */
    protected $fillable = ['message', 'state', 'car_id', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->attributes['message'];
    }

    public function setMessage($message): void
    {
        $this->attributes['message'] = $message;
    }

    public function getState(): string
    {
        return $this->attributes['state'];
    }

    public function setState($state): void
    {
        $this->attributes['state'] = $state;
    }

    public function getCarId(): string
    {
        return $this->attributes['car_id'];
    }

    public function setCarId($carId): void
    {
        $this->attributes['carId'] = $carId;
    }

    // Validations
    public static function validate(Request $request): void
    {
        $request->validate([
            'message' => 'required|max: 250',
            'state' => 'in:pending,accepted,rejected',
        ]);
    }
}
