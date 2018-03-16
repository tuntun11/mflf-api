<?php

namespace App\Transformers;

use PragmaRX\Countries\Package\Countries;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [];

    public function transform($model)
    {
        return [
            'name' => $model->name->common,
            'cca2' => $model->cca2,
            'cca3' => $model->cca3,
            'flag' => $model->flag['flag-icon'],//select only 1 icon 
        ];
    }

}
