<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id', 'name'];
    protected $table = 'tags';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

}
