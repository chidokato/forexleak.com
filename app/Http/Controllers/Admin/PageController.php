<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;
use File;

use App\Models\Category;
use App\Models\Section;
use App\Models\Post;
use App\Models\Images;

class PageController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Mặc định là 20 nếu không có lựa chọn
        $key = $request->get('key', '');
        $sort = $request->get('sort', 'desc'); // Mặc định là sắp xếp giảm dần
        
        $query = Post::query()->where('sort_by', 'page')->orderBy('id', 'DESC');

        if ($key) {
            $query->where('name', 'like', '%' . $key . '%');
        }

        // Thêm logic sắp xếp
        $query->orderBy('status', $sort);

        $posts = $query->paginate($perPage);

        return view('admin.page.index', compact(
            'posts',
        ));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();
        $post->user_id = Auth::User()->id;
        $post->status = 'true';
        $post->sort_by = 'page';
        $post->name = $data['name'];
        $post->content = $data['content'];
        $post->slug = Str::slug($data['name'], '-');
        
        $post->title = $data['title'];
        $post->description = $data['description'];
        
        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $this->saveImage($file);
            $post->img = $filename;
        }
        // ---------------------
        $post->save();

        // Thêm section
        // if (isset($data['heading'])) {
        //     foreach($data['heading'] as $key => $heading){
        //         $section = new Section();
        //         $section->post_id = $post->id;
        //         $section->heading = $heading;
        //         $section->content = $data['content_ss'][$key];

        //         // thêm ảnh
        //         $imgFiles = $request->file('img_ss');
        //         if (isset($imgFiles[$key]) && $imgFiles[$key]->isValid()) {
        //             $file = $imgFiles[$key];
        //             $filename = $this->saveImage($file);
        //             $section->img = $filename;
        //         }

        //         $section->save();
        //     }
        // }

        return redirect('admin/page')->with('Success','Success');
        // return response()->json(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::find($id);
        $section = Section::where('post_id', $data->id)->get();
        return view('admin.page.edit')->with(compact(
            'data',
            'section',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->content = $data['content0'];
        $post->title = $data['title'];
        $post->description = $data['description'];
        if ($request->hasFile('img')) {
            if(File::exists('data/images/'.$post->img)) { File::delete('data/images/'.$post->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $this->saveImage($file);
            $post->img = $filename;
        }
        // sửa section
        if (isset($data['id_edit'])) {
            foreach($data['id_edit'] as $key => $id_edit){
                $section = Section::find($id_edit);
                if ($section) {
                    $section->heading = $data['heading_edit'][$key] ?? '';
                    $section->content = $data['content_edit'][$key] ?? '';
                    // Lấy file ảnh tương ứng
                    $imgFiles = $request->file('img_ss_edit');
                    if (isset($imgFiles[$key]) && $imgFiles[$key]->isValid()) {
                        $file = $imgFiles[$key];
                        $filename = $this->saveImage($file);
                        $section->img = $filename;
                    }
                    $section->save();
                }
            }
        }
        $post->save();


        // Thêm section
        // if (isset($data['heading'])) {
        //     foreach($data['heading'] as $key => $heading){
        //         $section = new Section();
        //         $section->post_id = $post->id;
        //         $section->heading = $heading;
        //         $section->content = $data['content_ss'][$key];
        //         // thêm ảnh
        //         $imgFiles = $request->file('image_ss');
        //         if (isset($imgFiles[$key]) && $imgFiles[$key]->isValid()) {
        //             $file = $imgFiles[$key];
        //             $filename = $this->saveImage($file);
        //             $section->img = $filename;
        //         }
        //         $section->save();
        //     }
        // }
        
        return redirect()->back()->with('Success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::find($id);
        if(File::exists('data/images/'.$Post->img)) { File::delete('data/images/'.$Post->img);} // xóa ảnh cũ

        foreach($Post->Images as $val){
            $Images = Images::find($val['id']);
            if(File::exists('data/images/'.$val->img)) { File::delete('data/images/'.$val->img);} // xóa ảnh cũ
            $Images->delete();
        }

        foreach($Post->Section as $val){
            $Section = Section::find($val['id']);
            if(File::exists('data/images/'.$val->img)) { File::delete('data/images/'.$val->img);} // xóa ảnh cũ
            $Section->delete();
        }

        $Post->delete();
        return redirect()->back()->with('Success','Success');
    }


}
