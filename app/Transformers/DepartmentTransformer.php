<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [];

    public function transform(Department $model)
    {
        return [
            'code' => $model->code,
            'name' => $model->name,
        ];
    }

}
