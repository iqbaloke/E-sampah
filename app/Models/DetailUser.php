<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;
    protected $fillable = ['no_telepon', 'user_id', 'ktp', 'alamat','kabupaten_id','kecamatan_id','desa_id'];
}
