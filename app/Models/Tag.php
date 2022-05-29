<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'tag_slug', 'category_id', 'user_modify'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modify()
    {
        return $this->belongsTo(User::class, 'user_modify');
    }
}
