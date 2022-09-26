<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class SubLine extends Model
{
    use  HasRoles, HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'descrip',
        'image',
        'stateitem',
        'lineid',
    ];

    public function scopeAllitemsjoin($query)
    {
        return $query->where('sub_lines.stateitem', '!=', 3);
    }

    public function scopeAllitems($query)
    {
        return $query->where('stateitem', '!=', 3);
    }
    
    public function scopeActiveitems($query)
    {
        return $query->where('stateitem', '=', 1);
    }


}
