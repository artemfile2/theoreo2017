<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name'];
    protected $table = 'categories';

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function brand()
    {
        return $this->hasMany('App\Models\Brand');
    }

    public function filter()
    {
        return $this->hasMany('App\Models\Filter');
    }

}
