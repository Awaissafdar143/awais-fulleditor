<?php

namespace Awaistech\Larpack\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use SoftDeletes;protected $dates = ['deleted_at'];
    protected $guarded = [];
}
