<?php
namespace App\Http\Services;

use App\Http\Services\AppService;
use App\Models\MediaUpload;
use Illuminate\Support\Facades\Storage;

class UploadService extends AppService
{
    public function storeSignUpload($request)
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

    public function storeMultiUpload($request)
    {
        if ($request->hasFile('files')) {
            try {
                $thumbnails = [];
                foreach ($request->file('files') as $file) {
                    $name = $file->getClientOriginalName();
                    $pathFull = 'uploads/' . date("Y_m_d");

                    $file->storeAs(
                        'public/' . $pathFull, $name
                    );

                    // Store the file info in the database
                    $upload = new MediaUpload();
                    $upload->file_name = $name;
                    $upload->file_path = '/storage/' . $pathFull . '/' . $name;
                    $upload->type = $request->input('type'); // Store the type
                    $upload->save();

                    $thumbnails[] = [
                        'url' => $upload->file_path,
                        'name' => $upload->file_name,
                        'size' => round(Storage::size('public/' . $pathFull . '/' . $name) / 1024, 2)
                    ];
                }

                return response()->json([
                    'status' => true,
                    'thumbnails' => $thumbnails
                ]);
            } catch (\Exception $error) {
                return response()->json([
                    'status' => false,
                    'message' => $error->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No files found'
            ]);
        }
    }
}
