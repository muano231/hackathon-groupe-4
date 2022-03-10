<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    use HasFactory;

    protected $fillable = ['availability_start', 'availability_end', 'description', 'study_id'];

    public function questions(): HasMany
    {
        return $this->hasMany('App\Models\Question');
    }


}
