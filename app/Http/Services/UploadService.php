<?php
namespace App\Http\Services;

use App\Http\Services\AppService;
use App\Models\MediaUpload;

class UploadService extends AppService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y_m_d");

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                // Store the file info in the database
                $upload = new MediaUpload();
                $upload->file_name = $name;
                $upload->file_path = '/storage/' . $pathFull . '/' . $name;
                $upload->type = $request->input('type'); // Store the type
                $upload->save();

                return response()->json([
                    'status' => true,
                    'data' => $upload
                ]);
            } catch (\Exception  $error) {
                return response()->json([
                    'status' => false,
                    'message' => $error->getMessage()
                ]);
            }
        }
    }
}
