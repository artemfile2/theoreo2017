<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $table = 'tags';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function action()
    {
        return $this->belongsToMany('App\Models\Action', 'action_tag', 'tag_id', 'action_id');

    }
}
