<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = ['name', 'code'];
    protected $table = 'statuses';
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }
}				