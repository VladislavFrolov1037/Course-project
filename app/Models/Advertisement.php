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

    public function isInFavourites()
    {
        $user = auth()->user();
        if ($user) {
            return $this->favourites()->where('user_id', $user->id)->exists();
        } else {
            $favourites = session()->get('favourites', []);

            return in_array($this->id, $favourites);
        }
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'advertisement_id', 'id');
    }
}
