<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsTo(User::class);
    }

    public function testAnswers(): hasMany
    {
        return $this->hasMany(TestAnswer::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }
}
