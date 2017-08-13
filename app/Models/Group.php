<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'description'];
    protected $table = 'groups';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function filter()
    {
        return $this->hasMany('App\Models\Filter');
    }
}