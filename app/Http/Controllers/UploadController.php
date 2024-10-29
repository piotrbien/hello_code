<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;

class UploadController
{
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $upload = $request->file('file')->store('uploads');

        return Response::json([
            'data' => [
                $upload,
            ],
        ]);
    }
}
