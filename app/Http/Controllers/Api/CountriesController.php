<?php

namespace App\Http\Controllers\Api;

use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Transformers\CountryTransformer;

class CountriesController extends Controller
{
    use Helpers;

    protected $model;

    public function __construct()
    {
        //model import from package
        $this->model = new Countries(new Config([
            'hydrate' => [
                'elements' => [
                    'currencies' => false,
                    'flag' => true,
                    'timezones' => false,
                ],
            ],
        ]));
    }

    public function index(Request $request)
    {
       /* $paginator = $this->model->where("cca2", "TH")->take(10);

        return $this->response->paginator($paginator, new CountryTransformer());*/

        $countries = Countries::all();

        return response()->json($countries);
    }

    public function show($code)
    {
        $country = $this->model->where("cca2", $code)->first();

        return $this->response->item($country, new CountryTransformer());
    }

}