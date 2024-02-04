<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hi extends Model
{
    use HasFactory;

    protected $table = 'hi';

    protected $fillable = [
        'nama',
        'foto'
    ];

    protected $hidden = [];
}
