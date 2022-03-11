<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Study extends Model
{
    use HasFactory;

    public $fillable = ['product_id'];
    protected $appends = array('askPermission', 'hasPermission');

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getAskPermissionAttribute()
    {
        return StudyPermission::where('study_id', $this->id)->where('user_id', Auth::user()->id)->first() !== null;
    }

    public function getHasPermissionAttribute()
    {
        $sessions = $this->sessions()->get('id')->pluck('id');
        return SessionPermission::whereIn('session_id', $sessions)->where('user_id', Auth::user()->id)->exists();
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
