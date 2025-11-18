<?php

namespace App\Http\Controllers\API\Experience;

use AlifAhmmed\HelperPackage\Traits\AllTraits;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;

class ExperienceController extends Controller
{
    use AllTraits;

    public function index()
    {
        $data = Experience::all();

        return $this->success('Data retrieved successfully.', $data, 200);
    }

    public function show($id)
    {
        $data = Experience::find($id);

        if (!$data)
        {
            return $this->error('Data not found', 404);
        }

        return $this->success('Data retrieved successfully.', $data, 200);
    }
}
