<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilkom extends Model
{
    use HasFactory;

    protected $table = 'ilkom';

    protected $fillable = [
        'nidn',
        'nama',
        'jabatan_id',
        'foto'
    ];

    protected $hidden = [];

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
