<?php

namespace App\Observers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class ActivityLoggerObserver
{
    /**
     * Handle the "created" event.
     */
    public function created(Model $model)
    {
        activity()
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->withProperties(['attributes' => $model->getAttributes()])
            ->log('Created ' . class_basename($model));
    }

    /**
     * Handle the "updated" event.
     */
    public function updated(Model $model)
    {
        activity()
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->withProperties(['attributes' => $model->getChanges(), 'old' => $model->getOriginal()])
            ->log('Updated ' . class_basename($model));
    }

    /**
     * Handle the "deleted" event.
     */
    public function deleted(Model $model)
    {
        activity()
            ->performedOn($model)
            ->causedBy(auth()->user())
            ->withProperties(['attributes' => $model->getOriginal()])
            ->log('Deleted ' . class_basename($model));
    }
}
