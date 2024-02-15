<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeObject extends Model
{
    use HasFactory;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'type_object_id', 'id');
    }
}
