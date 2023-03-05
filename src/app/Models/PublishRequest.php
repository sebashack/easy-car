<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PublishRequest extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['message'] - string - contains the request message
     * $this->attributes['state'] - enum[Pending, Accepted, Rejected] - contains the request state
     */
    protected $fillable = ['message', 'state'];

    public function getId(): int
    {
        return $this->attributes['id'];
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

    public static function validate(Request $request): void
    {
        $request->validate([
            'message' => 'required|max: 250',
            'state' => 'required|in:pending,accepted,rejected',
        ]);
    }
}
