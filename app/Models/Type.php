<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code'];
    protected $table = 'types';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}				