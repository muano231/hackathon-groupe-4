<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = array('studies');


    public function sessions(){
        return $this->hasManyThrough(
            Session::class,
            SessionPermission::class,
            'user_id',
            'id',
            'id',
            'session_id'
        );
    }

    public function getStudiesAttribute(){
        $studies = Study::with('sessions', 'product')->get()->toArray();
        foreach ($studies as $i=>$study){
            $studies[$i]['askPermission'] = StudyPermission::where('user_id', $this->id)->where('study_id', $study['id'])->first() !== null;
            foreach ($study['sessions'] as $j=>$session){
                $studies[$i]['sessions'][$j]['permissionGiven'] = SessionPermission::where('user_id', $this->id)->where('session_id', $session['id'])->first() !== null;
            }
        }
       return $studies;
    }



}
