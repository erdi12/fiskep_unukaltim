<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiPgpaud extends Model
{
    use HasFactory;

    protected $table = 'visi_misi_pgpaud';

    protected $fillable = [
        'visi',
        'misi',
        'tujuan'
    ];

    protected $hidden = [];
}
