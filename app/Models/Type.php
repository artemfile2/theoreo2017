<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Type extends Model
{

    protected $fillable = ['name', 'code'];
    protected $table = 'types';
    protected $hidden = [
        'created_at', 'updated_at',
    ];

}				