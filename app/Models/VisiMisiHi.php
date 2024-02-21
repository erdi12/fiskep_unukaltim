<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiHi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi_hi';

    protected $fillable = [
        'visi',
        'misi',
        'tujuan'
    ];

    protected $hidden = [];
}
