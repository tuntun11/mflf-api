<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Transformers\DepartmentTransformer;

class DepartmentsController extends Controller
{
    use Helpers;

    protected $model;

    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $paginator = $this->model->paginate($request->get('limit', config('app.pagination_limit')));
        if ($request->has('limit')) {
            $paginator->appends('limit', $request->get('limit'));
        }

        return $this->response->paginator($paginator, new DepartmentTransformer());
    }

    public function show($code)
    {
        $department = $this->model->whereCode($code)->firstOrFail();

        return $this->response->item($department, new DepartmentTransformer());
    }

}