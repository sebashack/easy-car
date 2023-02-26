<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->attributes['message'] = $content;
    }

    public function getState(): String
    {
        return $this->attributes['state'];
    }

    public function setState($state): void
    {
        $this->attributes['state'] = $state;
    }
}
