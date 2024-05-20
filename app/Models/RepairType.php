<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairType extends Model
{
    use HasFactory;

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'repair_type_id', 'id');
    }
}
