<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    public $fillable = ['product_id'];

    public  function  product(){
        return $this->belongsTo(Product::class);
    }
    public function sessions(){
        return $this->hasMany(Session::class);
    }

}
