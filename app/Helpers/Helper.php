<?php

namespace App\Helpers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class Helper
{
    // Generate a unique slug from the given string
    public static function generateSlug($modal, $title)
    {

        // Generate the initial slug from the title
        $slug = Str::slug($title);

        // Check if the slug already exists in the database
        $existingSlug = $modal::where('slug', $slug)->get();

        // If the slug exists, keep generating a new slug until a unique one is found
        while ($existingSlug) {
            // Append a random string to the slug
            $randomString = Str::random(5);
            $newSlug = Str::slug($title).'-'.$randomString;

            // Check if the new slug exists
            $existingSlug = $modal::where('slug', $newSlug)->first();

            // Set the slug to the new unique slug
            if (! $existingSlug) {
                $slug = $newSlug;
            }
        }

        return $slug;
    }

    //! File or Image Upload
    public static function fileUpload($file, string $folder, string $name): ?string
    {
        if (!$file->isValid()) {
            return null;
        }

        $imageName = Str::slug($name) . '.' . $file->extension();
        $path = public_path('uploads/' . $folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file->move($path, $imageName);
        return 'uploads/' . $folder . '/' . $imageName;
    }

    //! File or Image Delete
    public static function fileDelete(string $path): void
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }

//! JSON Response
    public static function jsonResponse(bool $status, string $message, int $code, $data = null, bool $paginate = false, $paginateData = null): JsonResponse
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'code' => $code,
        ];

        if ($paginate && !empty($paginateData)) {
            $response['data'] = $data;
            $response['pagination'] = [
                'current_page' => $paginateData->currentPage(),
                'last_page' => $paginateData->lastPage(),
                'per_page' => $paginateData->perPage(),
                'total' => $paginateData->total(),
                'first_page_url' => $paginateData->url(1),
                'last_page_url' => $paginateData->url($paginateData->lastPage()),
                'next_page_url' => $paginateData->nextPageUrl(),
                'prev_page_url' => $paginateData->previousPageUrl(),
                'from' => $paginateData->firstItem(),
                'to' => $paginateData->lastItem(),
                'path' => $paginateData->path(),
            ];
        } elseif ($paginate && !empty($data)) {
            $response['data'] = $data->items();
            $response['pagination'] = [
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
                'first_page_url' => $data->url(1),
                'last_page_url' => $data->url($data->lastPage()),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'path' => $data->path(),
            ];
        } elseif ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public static function jsonErrorResponse(string $message, int $code = 400, array $errors = []): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => $code,
            'errors' => $errors,
        ], $code);
    }

}
