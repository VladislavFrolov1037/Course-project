<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function addresses()
    {
        return $this->hasMany(Address::class, 'district_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
