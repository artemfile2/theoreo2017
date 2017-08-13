<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['name', 'code'];
    protected $table = 'cities';
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function brand()
    {
        return $this->hasMany('App\Models\Brand');

    }

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }
}
