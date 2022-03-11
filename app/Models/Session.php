<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['availability_start', 'availability_end', 'description', 'study_id'];
    protected $appends = array('permissionGiven');


    public function getPermissionGivenAttribute()
    {
        return SessionPermission::where('session_id', $this->id)->where('user_id', Auth::user()->id)->first() !==  null;
    }


    public function questions(): HasMany
    {
        return $this->hasMany('App\Models\Question');
    }

    public function tests(): HasMany
    {
        return $this->hasMany('App\Models\Test');
    }

    public function study(): belongsTo
    {
        return $this->belongsTo('App\Models\Study');
    }

    public function permission(){
        return $this->belongsTo(SessionPermission::class);
    }

}
