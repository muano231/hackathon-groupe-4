<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'availability_start', 'availability_end'
    ];

    public function tests(){
        return $this->hasMany(Test::class);
    }
}
