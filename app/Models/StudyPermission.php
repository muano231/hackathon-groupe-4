<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPermission extends Model
{
    use HasFactory;
    protected $fillable = ['study_id', 'user_id'];
}
