<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Privilege extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'description'];
    protected $table = 'privilege';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function role()
    {
        return $this->belongsToMany('App\Models\Role');

    }
}				