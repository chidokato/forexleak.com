@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
<?php use App\Models\Category; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Quản lý bài viết</h2>
    <a class="add-iteam" href="{{route('post.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>

<div class="row">
    
    <form method="GET" action="{{ url()->current() }}">
      <div class="align-items-center">
        <div class="col-xl-12 col-lg-12 search d-flex flex-wrap gap-2 align-items-center">

          <input
            type="text"
            name="key"
            value="{{ request('key') }}"
            placeholder="Tìm kiếm..."
            class="form-control"
            style="max-width: 320px;"
          >

          <select name="cid" class="form-select form-control" style="max-width: 260px;">
            <option value="">-- Tất cả danh mục --</option>
            @foreach($category as $c)
              <option value="{{ $c->id }}" {{ (string)request('cid') === (string)$c->id ? 'selected' : '' }}>
                {{ $c->name }}
              </option>
            @endforeach
          </select>

          <button type="submit" class="btn btn-success mr-2">Tìm kiếm</button>

          <a href="{{ url()->current() }}" class="btn btn-warning">Reset</a>

        </div>
      </div>
    </form>


    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane overflow active" id="tab2">
                    @if(count($posts) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Hot</th>
                                <th>Status</th>
                                <th>date</th>
                                <th>User</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="post-data">
                            @foreach($posts as $val)
                            <tr id="post">
                                <input type="hidden" name="id" id="id" value="{{$val->id}}" >
                                <td class="thumb"><img src="data/images/{{$val->img}}"></td>
                                <td>
                                    <div class="name"><a href="{{route('post.edit',[$val->id])}}" >{{$val->name}}</a></div>
                                    
                                </td>
                                <!-- <td>{{$val->slug}}</td> -->
                                <td>{{number_format($val->price).' '.$val->unit}} 
                                    <div class="slug" style="color:red">{{$val->sale?'sale: '.$val->sale.'%':''}}</div>
                                </td>
                                <td>{{$val->category_id ? $val->category->name : ''}}</td>
                                <td>
                                    <label class="container"><input <?php if($val->hot == 'true'){echo "checked";} ?> type="checkbox" id='hot_post' ><span class="checkmark"></span></label>
                                </td>
                                <td>
                                    <label class="container"><input <?php if($val->status == 'true'){echo "checked";} ?> type="checkbox" id='status_post' ><span class="checkmark"></span></label>
                                </td>
                                <td>{{date_format($val->updated_at,"d/m/Y")}}</td>
                                <td>{{$val->User->yourname}}</td>
                                <td style="display: flex;">
                                    <a href="{{route('post.edit',[$val->id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a>
                                    <form action="{{route('post.destroy', [$val->id])}}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                {{ $posts->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection


