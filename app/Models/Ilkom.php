<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilkom extends Model
{
    use HasFactory;

    protected $table = 'ilkom';

    protected $fillable = [
        'nama',
        'foto'
    ];

    protected $hidden = [];
}
