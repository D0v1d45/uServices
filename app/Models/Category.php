<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\service;

class Category extends Model
{
    protected $fillable = ['category', 'provider', 'service','pnumber'];

public function services()
{
    return $this->hasMany(Service::class, 'categories_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function addService()
{
    return $this->belongsTo(Service::class, 'categories_id');
}

    use HasFactory;
}
