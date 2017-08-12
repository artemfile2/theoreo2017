<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Upload extends Model
{
    use SoftDeletes;

    protected $fillable = ['path', 'size', 'oldname', 'ext', 'mime'];
    protected $table = 'uploads';
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function action()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function brand()
    {
        return $this->hasMany('App\Models\Brand');
    }
}
