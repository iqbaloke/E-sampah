<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $fillable = ['bobot_name', 'bobot_slug', 'price', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
