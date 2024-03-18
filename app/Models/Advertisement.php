<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisements';
    protected $guarded = false;


    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'advertisement_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function repair_type()
    {
        return $this->belongsTo(RepairType::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter) {
        return $filter->apply($builder);
    }
}
