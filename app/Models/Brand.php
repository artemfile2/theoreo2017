<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = ['id', 'name', 'user_id', 'upload_id', 'adresses', 'phones', 'site_link', 'vk_link', 'is_federal', 'is_internet_shop'];
    protected $table = 'brands';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

}