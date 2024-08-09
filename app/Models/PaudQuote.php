<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaudQuote extends Model
{
    use HasFactory;

    protected $table = 'paud_quote';

    protected $fillable = ['quote'];

    protected $hidden = [];
}
