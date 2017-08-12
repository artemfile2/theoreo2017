<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class VkFeed
 *
 * Модель для хранения полученных данных с парсера
 * @package App
 */
class VkFeed extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
