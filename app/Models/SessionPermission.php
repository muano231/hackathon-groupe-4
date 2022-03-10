<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
    ];

    public function session(): belongsTo
    {
        return $this->belongsTo('App\Models\Session');
    }

    public function user() : belongsTo
    {
        return $this->belongsTo('App\Models\User');
    }



}
