<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_slug', 'category_name', 'category_image', 'user_modify'];

    public function modify()
    {
        return $this->belongsTo(User::class, 'user_modify');
    }

    public function bobot()
    {
        return $this->hasMany(Bobot::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }
}
