<?php

namespace App\Http\Controllers\Api;

use App\Models\Personnel;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Transformers\PersonnelTransformer;

class PersonnelsController extends Controller
{
    use Helpers;

    protected $model;

    public function __construct(Personnel $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $paginator = $this->model->paginate($request->get('limit', config('app.pagination_limit')));
        if ($request->has('limit')) {
            $paginator->appends('limit', $request->get('limit'));
        }

        return $this->response->paginator($paginator, new PersonnelTransformer());
    }

    public function show($id)
    {
        $personnel = $this->model->byId($id)->firstOrFail();

        return $this->response->item($personnel, new PersonnelTransformer());
    }

    public function search($keyword = "")
    {
        //find by name or personalId
        $paginator = $this->model
                    ->where('id', 'like', '%'.$keyword.'%')
                    ->orWhere('first_name', 'like', '%'.$keyword.'%')
                    ->orWhere('last_name', 'like', '%'.$keyword.'%')
                    ->orWhere('first_name_en', 'like', '%'.$keyword.'%')
                    ->orWhere('last_name_en', 'like', '%'.$keyword.'%')
                    ->paginate(config('app.pagination_limit'));

        return $this->response->paginator($paginator, new PersonnelTransformer());
    }

    /*Find personnel in department group*/
    public function department($dept)
    {
        //find by department code
        $personnels = $this->model
                    ->where('office_code', '=', $dept)
                    ->get();

        return $this->response->item($personnels, new PersonnelTransformer());
    }

}
