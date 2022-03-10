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
    protected $appends = array('askPermission');

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getAskPermissionAttribute()
    {
        return StudyPermission::where('study_id', $this->id)->where('user_id', Auth::user()->id)->first() !== null;
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
