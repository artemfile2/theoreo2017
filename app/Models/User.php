<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'login', 'surname', 'role_id', 'gender', 'upload_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    public function upload()
    {
        return $this->belongsTo('App\Models\Upload');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function brand()
    {
        return $this->hasMany('App\Models\Brand');
    }
}
