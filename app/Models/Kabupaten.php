<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $fillable = ['kabupaten','id_provinsi'];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

}
