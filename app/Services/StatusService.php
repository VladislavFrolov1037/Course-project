<?php

namespace App\Services;

class StatusService
{
    public function changeStatus($model, $action): void
    {
        if ($action === 'reject') {
            $model->status_id = 3;
        } elseif ($action === 'approve') {
            $model->status_id = 2;
        } else {
            $model->status_id = 4;
        }

        $model->save();
    }
}
