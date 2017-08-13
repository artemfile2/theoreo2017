<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Модель для хранения полученных данных с парсера
 * @package App
 */
class VkFeed extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    protected $guarded = [];
}
