<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'description'];
}
