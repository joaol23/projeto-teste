<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected static string $model = '';

    protected static function loadModel(): Model
    {
        return app(static::$model);
    }
}
