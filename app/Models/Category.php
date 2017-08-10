<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id', 'name'];
    protected $table = 'categories';

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
