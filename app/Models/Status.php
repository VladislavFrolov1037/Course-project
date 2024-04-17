<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
    public function feedbackRequests()
    {
        return $this->hasMany(FeedbackRequest::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

}
