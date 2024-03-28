<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
class service extends Model
{
    protected $fillable = ['categories_id', 'service', 'price', 'time'];
    public function addService()
{
    return $this->belongsTo(Category::class, 'categories_id');
}
public function category()
{
    return $this->belongsTo(Category::class, 'categories_id');
}


    use HasFactory;
}
