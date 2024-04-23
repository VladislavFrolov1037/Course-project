<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'date', 'time', 'advertisement_id', 'status_id'];

    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
