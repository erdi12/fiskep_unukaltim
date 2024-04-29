<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpm extends Model
{
    use HasFactory;

    protected $table = 'lpm';

    protected $fillable = [
        'nama',
        'slug',
        'link'
    ];

    protected $hidden = [];
}
