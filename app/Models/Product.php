<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'price', 'category_id', 'created_by'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
