<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriLabPgpaud extends Model
{
    use HasFactory;

    protected $table = 'galeri_lab_pgpauds';

    protected $fillable = [
        'foto_galeri',
    ];

    protected $hidden = [];
}
