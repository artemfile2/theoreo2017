<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Модель для хранения промежуточных данных полученных с таблицы vk_feed
 */
class VkTemp extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
}
