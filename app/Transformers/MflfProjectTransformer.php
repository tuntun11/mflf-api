<?php

namespace App\Transformers;

use App\Models\MflfProject;
use League\Fractal\TransformerAbstract;

class MflfProjectTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [];

    public function transform(MflfProject $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'state' => $model->state,
            'country' => $model->country,
        ];
    }

}
