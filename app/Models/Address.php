<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = false;

    public $timestamps = false;

    protected function address(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return mb_strtoupper(mb_substr($value, 0, 1)).mb_strtolower(mb_substr($value, 1));
            },
            set: function ($value) {
                return mb_strtoupper(mb_substr($value, 0, 1)).mb_strtolower(mb_substr($value, 1));
            }
        );
    }

    public function advertisements()
    {
        return $this->hasOne(Advertisement::class, 'address_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
