<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'status_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'status_id', 'id');
    }
    public function meetings()
    {
        return $this->hasMany(Meeting::class, 'status_id', 'id');
    }
    public function feedbackRequests()
    {
        return $this->hasMany(FeedbackRequest::class, 'status_id', 'id');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'status_id', 'id');
    }

}
