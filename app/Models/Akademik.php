<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    use HasFactory;

    protected $table = 'akademik';

    protected $fillable = [
        'nama',
        'link'
    ];

    protected $hidden = [];
}
