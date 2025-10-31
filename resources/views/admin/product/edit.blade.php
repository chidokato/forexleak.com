@extends('admin.layout.main')
@section('content')
<?php use App\Models\Images; ?>
<?php use App\Models\CategoryTranslation; ?>
<form method="POST" action="{{route('product.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('product.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a target="_blank" href="{{$data->Category->slug}}/{{$data->slug}}">
        <li class="nav-item mobile-hide">
            <button type="button" class="btn btn-warning mr-2 form-control"><i class='fas fa-eye'></i> Xem</button>
        </li></a>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger mr-2 form-control"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success form-control"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex" style="height: 38px;">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{$data->name}}</h2>
</div>

<div class="row">
  <div class="col-xl-9 col-lg-9">
        <div class="card shadow mb-2">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#vi">Chỉnh sửa</a></li>
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Name</label>
                                  <input value="{{$data->name}}" name="name" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Slug</label>
                                  <input value="{{$data->slug}}" name="slug" placeholder="..." type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                  <label>Mô tả ngắn</label>
                                  <textarea rows="5" name="detail" class="form-control" >{{$data->detail}}</textarea>
                              </div>
                              <div class="form-group">
                                  <label>Nội dung</label>
                                  <textarea name="content" class="form-control editor" >{{$data->content}}</textarea>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                </div>
            </div>
        </div>

<!-- SEO -->
<div class="card shadow mb-2 ">
  <div class="card-header d-flex flex-row align-items-center justify-content-between">
  <ul class="nav nav-pills">
  <li><a data-toggle="tab" class="nav-link active" href="#vi">SEO</a></li>
  </ul>
  </div>
  <div class="card-body">
  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  <label>Title</label>
  <input value="{{$data->title}}" name="title" placeholder="..." type="text" class="form-control">
  </div>
  </div>
  <div class="col-md-12">
  <div class="form-group">
  <label>Description</label>
  <input value="{{$data->description}}" name="description" placeholder="..." type="text" class="form-control">
  </div>
  </div>
  </div>
  </div>
</div>

    </div>
    <div class="col-xl-3 col-lg-3">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin chi tiết</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="">Danh mục</label>
                    <select name='category_id' class="form-control select2" id="parent">
                      <option value="">--Chọn danh mục--</option>
                      @foreach($category as $val)
                      <?php addeditcat ($category,0,$str='',$data['category_id']); ?>
                      @endforeach
                    </select>
                    <div id="list_parent"></div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">$</span>
                        </div>
                        <input type="text" name="price" value="{{$data->price}}" class="form-control price" placeholder="Giá bán">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">$</span>
                        </div>
                        <input type="text" name="price_max" value="{{$data->price_max}}" class="form-control price" placeholder="Giá gốc">
                    </div>
                </div>
                
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Images</h6>
            </div>
            <div class="card-body">
                <div class="file-upload">
                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                        <img class="file-upload-image" src="{{ isset($data) ? 'data/images/'.$data->img : 'data/no_image.jpg' }}" />
                    </div>
                    <div class="image-upload-wrap">
                        <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                    </div>
                </div>
            </div>
          </div>
         
          
        <div class="card shadow mb-2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chọn nhiều ảnh</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="file" name="imgdetail[]" multiple class="form-control">
                    <p>Nhấn giữ <i style="color: red">Ctrl</i> để chọn nhiều ảnh !</p>
                </div>
                <div class="row detail-img">
                    @foreach($images as $val)
                    <div class="col-md-6" id="detail_img">
                        <img src="data/images/{{$val->img}}">
                        <button onClick="delete_row(this)" type="button" id="del_img_detail"> <i class="fa fa-times" aria-hidden="true"></i> </button>
                        <input type="hidden"  name="id_img_detail" id="id_img_detail" value="{{$val->id}}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
      </div>
</div>
</form>

<style>
.detail-img img{ width:100% }
.detail-img .col-md-6{ position:relative; }
.detail-img button{ color:#fff; background:red; border:none; border-radius:100%; position:absolute; top:0; right:13px }
</style>
<script>
function delete_row(button) {
    var div = button.closest('.col-md-6');
    div.style.display = 'none';
}
</script>

<?php 
    function addeditcat ($data, $parent=0, $str='',$select=0)
    {
        foreach ($data as $value) {
            if ($value['parent'] == $parent) {
                if($select != 0 && $value['id'] == $select )
                { ?>
                    <option value="<?php echo $value['id']; ?>" selected> <?php echo $str.$value['name']; ?> </option>
                <?php } else { ?>
                    <option value="<?php echo $value['id']; ?>" > <?php echo $str.$value['name']; ?> </option>
                <?php }
                
                addeditcat ($data, $value['id'], $str.'___',$select);
            }
        }
    }
?>


@endsection