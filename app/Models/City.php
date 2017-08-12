<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code'];
    protected $table = 'cities';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $dates = ['deleted_at'];


    public function brand()
    {
        return $this->hasMany('App\Models\Brand');

    }

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }
}
