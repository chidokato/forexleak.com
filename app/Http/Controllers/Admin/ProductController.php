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
        $posts = Post::where('sort_by', 'Product')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $post = Post::find($id);
        $post->slug = $data['slug'];
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->detail = $data['detail'];
        $post->content = $data['content'];
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->price = $data['price'];
        $post->price_max = $data['price_max'];

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
