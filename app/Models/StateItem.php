<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'descrip',
    ];
}
