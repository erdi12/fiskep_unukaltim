<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiLaboratoriumPgpaud extends Model
{
    use HasFactory;

    protected $table = 'visi_misi_laboratorium_pgpauds';

    protected $fillable = [
        'visi',
        'misi'
    ];

    protected $hidden = [];
}
