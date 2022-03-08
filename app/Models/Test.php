<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    public $fillable = [
        'age',
        'zone_code',
        'session_id',
        'user_id',
        'device_serial_number',
        'Olevel',
        'temperature',
        'zone_code',
        'UV',
        'weather_condition',
        'lat',
        'long',

    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function testAnswers()
    {
        return $this->belongsTo('App\TestAnswer');
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }

}
