<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgpaud extends Model
{
    use HasFactory;

    protected $table = 'pgpaud';

    protected $fillable = [
        'nama',
        'foto',
    ];

    protected $hidden = [];
}