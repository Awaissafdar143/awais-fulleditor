<?php

namespace Awaistech\Larpack\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class seo extends Model
{
    protected $guarded=[];
    
    use LogsActivity;

    // Define which attributes should be logged.
    protected static $logAttributes = ['title', 'description', 'keywords']; // Update these as needed

    // Optional: Log only the attributes that have actually changed.
    protected static $logOnlyDirty = true;

    // Optional: Prevent logging if no attribute has changed.
    // protected static $submitEmptyLogs = false;

    /**
     * Configure the activity log options for the model.
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(self::$logAttributes)
            ->useLogName('seo')
            ->setDescriptionForEvent(function (string $eventName) {
                return "Seo model has been {$eventName}";
            });
    }

    /**
     * Modify the activity before it is saved.
     *
     * This method allows you to add custom properties to your log entry.
     *
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @param  string  $eventName
     * @return void
     */
    public function tapActivity(Activity $activity, string $eventName)
    {
        // Add the IP address from which the request was made.
        $activity->properties = $activity->properties->merge(['ip' => request()->ip()]);
    }
}
