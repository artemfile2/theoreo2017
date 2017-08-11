<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $guarded = ['id', 'name', 'brand_id', 'upload_id', 'status_id', 'city_id', 'description', 'adresses', 'phones', 'shop_link', 'active_from', 'active_to', 'category_id', 'rating'];
    protected $table = 'actions';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

}