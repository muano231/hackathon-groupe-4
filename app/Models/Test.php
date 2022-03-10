<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function testAnswers(): BelongsTo
    {
        return $this->belongsTo('App\TestAnswer');
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo('App\Session');
    }
}
