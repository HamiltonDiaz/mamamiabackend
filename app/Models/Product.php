<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    use  HasRoles, HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'descrip',
        'image',
        'price',
        'stateitem',
        'sublineid',
    ];

    public function scopeAllitemsjoin($query)
    {
        return $query->where('products.stateitem', '!=', 3);
    }

    public function scopeActiveitems($query)
    {
        return $query->where('stateitem', '=', 1);
    }
}
