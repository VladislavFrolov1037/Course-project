<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = false;

    public $timestamps = false;

    public function advertisements()
    {
        return $this->hasOne(Advertisement::class, 'address_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
