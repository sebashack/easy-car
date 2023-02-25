<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['content'] - string - contains the review's text content
     * $this->attributes['rating'] - int - contains the car model's numeric rating (from 1 to 5)
    */
    use HasFactory;

    protected $fillable = ['content','rating'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getContent(): string
    {
        return $this->attributes['content'];
    }

    public function setContet($content) : void
    {
        $this->attributes['content'] = $content;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating) : void
    {
        $this->attributes['rating'] = $rating;
    }
}