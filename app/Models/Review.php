<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = false;

    public $timestamps = false;

    protected function comment(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => mb_strtoupper(mb_substr($value, 0, 1)).mb_strtolower(mb_substr($value, 1))
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
