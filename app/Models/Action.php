<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Action extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'brand_id', 'upload_id', 'status_id', 'type_id', 'city_id', 'description', 'addresses', 'phones', 'shop_link', 'active_from', 'active_to', 'category_id', 'rating'];
    protected $table = 'actions';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function upload()
    {
        return $this->belongsTo('App\Models\Upload');
    }

    public function scopeIntime($query)
    {
        return $query->where(function ($query) {
            $query->orWhere(function ($query) {
                $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'))->where(DB::raw('NOW()'), '<', DB::raw('active_to'));
            })->orWhere(function ($query) {
                $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'))->whereNull('active_to');
            });
        });
    }

    public function scopeSortBy($query, $sort)
    {
        if ($sort == 'active') {
            $query = $query->orderBy('active_to', 'DESC');
        } elseif ($sort == 'rating'){
            $query = $query->orderBy('rating', 'ASC');
        }
        return $query;
    }

    public function scopeInCategory($query, $id)
    {
        return $query->where('category_id', '=', $id);
    }

    public function scopeWithTag($query, $tag)
    {
        return  $query->whereHas('tag', function($q) use ($tag){
            $q->where('name', 'like', $tag);
        });
    }

    public function scopeWithBrand($query, $id)
    {
        return $query->where('brand_id', '=', $id);
    }

    public function scopeNotInTime($query)
    {
        return $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'))->where(DB::raw('NOW()'), '>', DB::raw('active_to'));


    }

    public function scopePastAndActive($query)
    {
        return $query->where(DB::raw('NOW()'), '>=', DB::raw('active_from'));

    }



    public function scopeSearch($query, $query_str)
    {
        return $query->whereHas('tag', function($q) use ($query_str){
                    $q->where('name', 'like', $query_str);
               })
            ->orWhereHas('category', function($q) use ($query_str){
                $q->where('name', 'like', $query_str);
            })
            ->orWhereHas('brand', function($q) use ($query_str){
                $q->where('name', 'like', $query_str);
            })
            ->orWhere('title', 'like', '%'.$query_str.'%')
            ->orWhere('description', 'like', '%'.$query_str.'%')
            ->orWhere('addresses', 'like', '%'.$query_str.'%');
    }
}