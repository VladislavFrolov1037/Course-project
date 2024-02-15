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

}
