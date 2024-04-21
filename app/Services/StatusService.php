<?php

namespace App\Services;

class StatusService
{
    public function changeStatus($model, $action)
    {
        if ($action === 'reject') {
            $model->status_id = 3;
        } else if ($action === 'approve') {
            $model->status_id = 2;
        } else {
            $model->status_id = 4;
        }

        $model->save();
    }
}
