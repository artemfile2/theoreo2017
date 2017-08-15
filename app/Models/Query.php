<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Query extends Model
{
    use SoftDeletes;

    protected $fillable = ['query_text', 'query_cnt', 'last_date', 'results_cnt'];
    protected $table = 'queries';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}