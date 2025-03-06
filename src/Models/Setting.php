<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // use SoftDeletes;protected $dates = ['deleted_at'];
    protected $fillable = ['key', 'value'];
    public $timestamps = false; // Disable timestamps if not needed

    // Get a setting by key with an optional default value
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    // Set (or update) a setting value by key
    public static function set($key, $value)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
