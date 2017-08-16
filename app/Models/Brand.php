<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'user_id', 'upload_id', 'addresses', 'phones', 'site_link', 'vk_link', 'is_federal', 'is_internet_shop'];
    protected $table = 'brands';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'category_brand', 'brand_id', 'category_id');

    }

    public function city()
    {
        return $this->belongsToMany('App\Models\City', 'city_brand', 'brand_id', 'city_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function upload()
    {
        return $this->belongsTo('App\Models\Upload');
    }

}