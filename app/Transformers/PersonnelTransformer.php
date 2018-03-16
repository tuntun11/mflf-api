<?php

namespace App\Transformers;

use App\Models\Personnel;
use League\Fractal\TransformerAbstract;

/**
 * Class PersonnelTransformer.
 */
class PersonnelTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = [];

    public function transform(Personnel $model)
    {
        return [
            'id' => $model->id,
            'prefix' => $model->prefix,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'full_name' => $model->prefix.$model->first_name." ".$model->last_name,
            'prefix_en' => $model->prefix_en,
            'first_name_en' => $model->first_name_en,
            'last_name_en' => $model->last_name_en,
            'full_name_en' => $model->prefix_en.$model->first_name_en." ".$model->last_name_en,
            'email' => $model->email,
            'position' => $model->position,
            'office_code' => $model->office_code,
            'office_name' => $model->officeName(),
        ];
    }

}
