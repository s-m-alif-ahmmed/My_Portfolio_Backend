<?php

namespace App\Http\Controllers\API\Education;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Education::all();

        return $this->success('Data retrieved successfully.', $data, 200);
    }

    public function show($id)
    {
        $data = Education::find($id);

        if (!$data)
        {
            return $this->error('Data not found', 404);
        }

        return $this->success('Data retrieved successfully.', $data, 200);
    }

}
