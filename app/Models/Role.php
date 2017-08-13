<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name'];
    protected $table = 'roles';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
    public function privilege()
    {
        return $this->belongsTo('App\Models\Privilege');
    }
}