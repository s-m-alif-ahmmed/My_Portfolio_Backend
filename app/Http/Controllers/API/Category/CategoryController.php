<?php

namespace App\Http\Controllers\API\Category;

use AlifAhmmed\HelperPackage\Traits\AllTraits;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use AllTraits;

    public function index()
    {
        $data = Category::all();

        return $this->success('Data retrieved successfully.', $data, 200);
    }

    public function show($id)
    {
        $data = Category::find($id);

        if (!$data)
        {
            return $this->error('Data not found', 404);
        }

        return $this->success('Data retrieved successfully.', $data, 200);
    }
}
