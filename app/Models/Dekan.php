<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dekan extends Model
{
    use HasFactory;

    protected $table = 'dekan';

    protected $fillable = [
        'nama',
        'nidn',
        'foto_dekan',
        'jabatan_id'
    ];

    protected $hidden = [];

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
