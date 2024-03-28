<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }

    public function addServices()
    {
        return $this->hasMany(Category::class, 'user_id');
    }
    public function category()
{
    return $this->hasOne(Category::class, 'user_id');
}


    use HasFactory;
}
