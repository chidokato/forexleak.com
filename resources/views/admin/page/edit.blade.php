@extends('admin.layout.main')

@section('css')
<link href="admin_asset/css/edit.css" rel="stylesheet">
@endsection

@section('js')
<script src="admin_asset/js/edit.js"></script>
@endsection

@section('content')
@include('admin.alert')
<?php use App\Models\Images; use App\Models\Option; ?>
<form id="validateForm" method="POST" action="{{route('page.update', [$data->id])}}" enctype="multipart/form-data">
@csrf
@method('PUT')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed">
    <button type="button" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
    <ul class="navbar-nav ">
        <li class="nav-item"> <a class="nav-link line-1" href="{{route('page.index')}}" ><i class="fa fa-chevron-left" aria-hidden="true"></i> <span class="mobile-hide">Quay lại</span> </a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" target="_blank" href="{{asset('')}}" >
                <i class="fas fa-external-link-alt mr-2"></i> {{__('lang.home')}}
            </a>
        </li>
        <li class="nav-item mobile-hide mr-2">
            <button onclick="window.open('{{ url($data->slug) }}', '_blank');" type="reset" class="btn-info btn"><i class="fas fa-eye"></i> View </button>
        </li>
        <li class="nav-item mobile-hide">
            <button type="reset" class="btn-danger btn"><i class="fas fa-sync"></i> Làm mới</button>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item">
            <button type="submit" class="btn-success btn"><i class="far fa-save"></i> Lưu lại</button>
        </li>
    </ul>
</nav>

<div class="d-sm-flex align-items-center justify-content-between mb-3 flex" style="height: 38px;">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Chỉnh sửa</h2>
</div>

<div class="row">
    <div class="col-xl-9 col-lg-9">
        <div class="linkneo" id="section1">
            <div class="card shadow mb-4" >
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin chung</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tiêu đề</label>
                        <div class="col-sm-10 input-group">
                            <input value="{{$data->name}}" name="name" placeholder="Tiêu đề" type="text" class="form-control">
                            <input value="{{$data->slug}}" name="slug" placeholder="slug" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="linkneo" id="section2">
            <div class="card shadow mb-4" >
                <span class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nội dung</h6>
                </span>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control editor" name="content0"> {!! $data->content !!} </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <span class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
                <button data-id="{{$data->id}}" id="addSectionButton" class="btn-success btn mr-3" type="button">Thêm Section</button>
            </span>
            <div class="card-body">
                <div class="tab-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="loadSection">
                            @foreach($section as $key => $val)
                            <tr id="post">
                                <input type="hidden" name="id" id="id" value="{{$val->id}}" >
                                <td>
                                    <div class="name">{{$val->heading}}</div>
                                </td>
                                <td style="display: flex;">
                                    <button data-url="admin/section/edit/{{$val->id}}" type="button" class="button_none click_view_section"><i class="fas fa-edit" aria-hidden="true"></i> Chỉnh sửa</button>
                                    <button data-url="admin/section/dell/{{$val->id}}" type="button" class="button_none click_dell_section ml-3"><i class="fas fa-trash-alt" aria-hidden="true"></i> Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="linkneo" id="seo">
            <div class="card shadow mb-4" >
                <span class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cấu hình SEO</h6>
                </span>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="">Title</label>
                                <input value="{{$data->title}}" name="title" placeholder="..." type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="">description</label>
                                <input value="{{$data->description}}" name="description" placeholder="..." type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3" >
        <div class="card shadow mb-4" >
            <span class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Hình ảnh</h6>
            </span>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="display: flex;">
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
                </div>
            </div>
        </div>
       
    </div>
</div>
</form>


<!-- Lớp mờ nền -->
<div id="overlay"></div>

<!-- Panel trượt từ bên phải -->
<div id="view_section">
    
</div>

<style>
    #load_maps iframe {
        width: 100%;
        height: 450px;
        border: 0;
    }
</style>

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
<script>
    function delete_row(e) {
        e.parentElement.remove();
    }
</script>

<script type="text/javascript">
document.querySelectorAll('.price-input').forEach(function (input) {
    input.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Loại bỏ ký tự không phải số
        value = new Intl.NumberFormat('vi-VN').format(value); // Định dạng số theo kiểu Việt Nam
        e.target.value = value;
    });
});
</script>


<script>
    document.querySelector('.price-input').addEventListener('input', function() {
        let price = this.value.replace(/\./g, ''); // Bỏ dấu chấm để lấy giá trị số
        if (price) {
            let priceInWords = numberToWords(Number(price));
            document.querySelector('.viewprice').textContent = priceInWords;
        } else {
            document.querySelector('.viewprice').textContent = '';
        }
    });
    function numberToWords(number) {
        const units = [
            { value: 1E9, suffix: " tỷ" },
            { value: 1E6, suffix: " triệu" },
            { value: 1E3, suffix: " nghìn" },
            { value: 1, suffix: " đồng" }
        ];
        for (let i = 0; i < units.length; i++) {
            if (number >= units[i].value) {
                let value = (number / units[i].value).toFixed(1).replace('.0', '');
                return value + units[i].suffix;
            }
        }
    }
</script>

@endsection