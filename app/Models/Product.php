<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function weight()
    {
        return $this->belongsTo(Weight::class, 'weight_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function quality()
    {
        return $this->belongsTo(Quality::class, 'quality_id', 'id');
    }

    
}
