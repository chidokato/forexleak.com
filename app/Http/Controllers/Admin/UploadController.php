<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(Request $request)
{
    Log::info('Upload request received.');

    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Resize image (nếu là ảnh)
        if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $image = \Image::make($file)->resize(1500, 1500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->save($destinationPath . '/' . $filename);
        } else {
            // Nếu không phải ảnh thì lưu file thường
            $file->move($destinationPath, $filename);
        }

        $url = url('/uploads/' . $filename);

        Log::info('File uploaded successfully.', ['url' => $url]);

        // 👉 TRẢ VỀ CHUẨN CHO CKEDITOR
        return response()->json([
            'url' => $url
        ]);
    }

    Log::error('File upload failed.');
    return response()->json([
        'error' => [
            'message' => 'File upload failed.'
        ]
    ], 400);
}

}