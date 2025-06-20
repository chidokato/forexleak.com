<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

use App\Models\Section;
use App\Models\SectionTranslation;
use Illuminate\Support\Facades\Auth;
use App\Models\Images;

use Image;
use File;

class SectionController extends Controller
{
    function saveImage($file, $path = 'data/images/', $maxWidth = 1500, $maxHeight = 1500) {
        $originalFilename = $file->getClientOriginalName();
        $filenameWithoutExtension = Str::slug(pathinfo($originalFilename, PATHINFO_FILENAME), '-');
        $extension = $file->getClientOriginalExtension();
        $filename = $filenameWithoutExtension . '.' . $extension;

        while (file_exists(public_path($path . $filename))) {
            $filename = $filenameWithoutExtension . '_' . rand(0, 99) . '.' . $extension;
        }
        $img = Image::make($file);
        $img->resize($maxWidth, $maxHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save(public_path($path . $filename));
        return $filename;
    }

    public function index($id)
    {
        // Lấy lại danh sách section sau khi thêm mới
        $sections = Section::where('post_id', $id)->get();

        // Trả về view partial chỉ có tbody (dùng cho ajax)
        return view('admin.section._load_Section', compact('sections'))->render();
    }

    public function AddSection($id)
    {
        $section = new Section();
        $section->heading = 'default...';
        $section->post_id = $id;
        $section->save();

        // Lấy lại danh sách section sau khi thêm mới
        $sections = Section::where('post_id', $id)->get();

        // Trả về view partial chỉ có tbody (dùng cho ajax)
        return view('admin.section._load_Section', compact('sections'))->render();
    }

    public function editsection($id)
    {
        $section = Section::find($id);
        return view('admin.page.edit_section', [
            'section' => $section,
        ]);
    }

    public function updateSection(Request $request, $id)
    {

        $data = $request->all();
        $section = Section::findOrFail($id);
        $section->heading = $data['heading'];
        $section->content = $data['content_ss'];

        if ($request->hasFile('img_ss')) {
            if(File::exists('data/images/'.$section->img)) { File::delete('data/images/'.$section->img);} // xóa ảnh cũ
            $file = $request->file('img_ss');
            $filename = $this->saveImage($file);
            $section->img = $filename;
        }

        $section->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Section cập nhật thành công'
        ]);
    }


    public function DellSection($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json(['error' => 'Section không tồn tại!'], 404);
        }

        // Xóa section
        $section->delete();

        return response()->json(['success' => 'Section đã được xoá thành công!']);
    }


    
}
