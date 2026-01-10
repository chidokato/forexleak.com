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
use App\Models\Post;
use App\Models\Images;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Section;

class ProductController extends Controller
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

    public function index()
    {
        $category = Category::where('sort_by', 'Product')
        ->where('parent', 0)
        ->with('children')
        ->orderByDesc('view')
        ->get();
        $posts = Post::query()
            ->where('sort_by', 'Product')
            ->when(request('key'), function ($q, $key) {
                $q->where('name', 'like', "%{$key}%");
            })
            ->when(request('cid'), function ($q, $cid) {
                $q->where('category_id', $cid);
            })
            ->orderByRaw('CASE
                WHEN priority IN (1,2,3,4) THEN priority
                ELSE 999
                END ASC')
            ->orderByDesc('id')
            ->paginate(40)
            ->withQueryString();

        return view('admin.product.index', compact('posts', 'category'));
    }


    public function ajaxUpdatePriority(Request $request, Post $post)
    {
        $data = $request->validate([
            'priority' => ['required', 'integer', 'in:1,2,3,4'],
        ]);

        $post->priority = (int) $data['priority'];
        $post->save();

        return response()->json([
            'ok' => true,
            'message' => 'Đã cập nhật độ ưu tiên',
            'id' => $post->id,
            'priority' => $post->priority,
        ]);
    }

    
    
    public function create()
    {
        $category = Category::where('sort_by', 'Product')->get();
        return view('admin.product.create')->with(compact('category'));
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
        $post->sort_by = 'Product';
        $post->slug = Str::slug($data['name'], '-');
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        $post->content = $data['content'];
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->price = $data['price'];
        $post->price_max = $data['price_max'];

        // thêm ảnh
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = $this->saveImage($file);
            $post->img = $filename;
        }
        // ---------------------
        
        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $this->saveImage($file);
                    $Images->img = $filename;
                    $Images->name = $filename;
                    $Images->save();
                }
            }
        }

        return redirect('admin/product')->with('success','Thành công');
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
        $category = Category::where('sort_by', 'Product')->get();
        $images = Images::where('post_id', $data->id)->get();
        return view('admin.product.edit')->with(compact(
          'category',
          'data',
          'images',
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

        // $request->validate([
        //     'file' => 'required|file|max:20048', // giới hạn 20MB
        // ]);

        $post = Post::find($id);
        $post->slug = $data['slug'];
        $post->name = $data['name'];
        $post->category_id = (int) $data['category_id'];
        $post->detail = $data['detail'];
        $post->content = $data['content'];
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->price = $data['price'];
        $post->price_max = $data['price_max'];

        $ids = $data['category_ids'] ?? [];
        $ids = array_values(array_unique(array_map('intval', $ids)));

        // đảm bảo danh mục chính luôn nằm trong danh sách nhiều
        if (!in_array($post->category_id, $ids, true)) {
            array_unshift($ids, $post->category_id);
        }

        $post->category_ids = $ids;

        if ($request->file('file')) {
            if (!empty($post->filename)) {
                $oldPath = str_replace('\\', '/', public_path('upfiles/' . $post->filename));
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName(); // Lấy tên gốc của file
            $cleanName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $originalName);
            $fileName = time() . '_' . $cleanName; // Đặt tên file (nếu muốn tránh trùng)
            $destinationPath = public_path('upfiles'); // Thư mục lưu trong thư mục public
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true); // Tạo thư mục nếu chưa có
            }
            $file->move($destinationPath, $fileName); // Di chuyển file đến thư mục public/upfiles
            $post->filename = $fileName;
        }

        if ($request->hasFile('img')) {
            if(File::exists('data/images/'.$post->img)) { File::delete('data/images/'.$post->img);} // xóa ảnh cũ
            $file = $request->file('img');
            $filename = $this->saveImage($file);
            $post->img = $filename;
        }

        $post->save();

        if($request->hasFile('imgdetail')){
            foreach ($request->file('imgdetail') as $file) {
                if(isset($file)){
                    $Images = new Images();
                    $Images->post_id = $post->id;
                    $filename = $this->saveImage($file);
                    $Images->img = $filename;
                    $Images->name = $filename;
                    $Images->save();
                }
            }
        }

        return redirect()->back()->with('success','Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $images = Images::where('post_id', $id)->get();
      foreach ($images as $key => $val) {
          $img = Images::find($val->id);
          if(File::exists('data/images/'.$img->img)) { File::delete('data/images/'.$img->img);} // xóa ảnh cũ
          $img->delete();
      }

      $Post = Post::find($id);
      if(File::exists('data/images/'.$Post->img)) { File::delete('data/images/'.$Post->img);} // xóa ảnh cũ
      $Post->delete();

      return redirect()->back()->with('success','success');
    }
}
