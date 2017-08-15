<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Filter extends Model
{
    use SoftDeletes;

    protected $fillable = ['group_id', 'code', 'description'];
    protected $table = 'filters';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'category_filter', 'filter_id', 'category_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
