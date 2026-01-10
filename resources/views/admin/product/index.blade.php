@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Danh sách sản phẩm</h2>
    <a class="add-iteam" href="{{route('product.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button></a>
</div>


<div class="row">
  <div class="col-12 mb-3">
    <form method="GET" action="{{ url()->current() }}">
      <div class="d-flex flex-wrap gap-2 align-items-center">

        <input type="text" name="key" value="{{ request('key') }}"
               placeholder="Tìm kiếm..." class="form-control" style="max-width: 320px;">

        <select name="cid" class="form-control" style="max-width: 260px;">
          <option value="">-- Tất cả danh mục --</option>

          @foreach($category as $c)
            <option value="{{ $c->id }}" {{ request('cid') == $c->id ? 'selected' : '' }}>
              {{ $c->name }}
            </option>

            @foreach($c->children as $child)
              <option value="{{ $child->id }}" {{ request('cid') == $child->id ? 'selected' : '' }}>
                — {{ $child->name }}
              </option>
            @endforeach
          @endforeach
        </select>

        <button type="submit" class="btn btn-success">Tìm kiếm</button>
        <a href="{{ url()->current() }}" class="btn btn-warning">Reset</a>
      </div>
    </form>
  </div>

  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <ul class="nav nav-pills">
          <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
        </ul>
      </div>

      <div class="tab-content">
        <div class="tab-pane overflow active" id="tab1">
          @if($posts->count() > 0)
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Price</th>
                  <th>User</th>
                  <th>Sort By</th>
                  <th>date</th>
                  <th>Priority</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach($posts as $val)
                  <tr>
                    <td>
                      <a href="{{ route('product.edit', $val->id) }}" class="mr-2">{{ $val->name }}</a>
                    </td>
                    <td>{{ $val->category->name ?? '---' }}</td>
                    <td>{{ $val->status }}</td>
                    <td>${{ $val->price }} / <span style="text-decoration: line-through;">${{ $val->price_max }}</span></td>
                    <td>Admin</td>
                    <td>{{ $val->sort_by }}</td>
                    <td>{{ $val->updated_at }}</td>
                    <td style="min-width:120px">
                      <select class="form-control form-control-sm js-priority" data-id="{{ $val->id }}">
                        @for($i=1; $i<=4; $i++)
                          <option value="{{ $i }}" {{ (int)($val->priority ?? 4) === $i ? 'selected' : '' }}>
                            Ưu tiên {{ $i }}
                          </option>
                        @endfor
                      </select>
                    </td>
                    <td class="d-flex gap-2">
                      <a href="{{ route('product.edit', $val->id) }}"><i class="fas fa-edit"></i></a>

                      <form action="{{ route('product.destroy', $val->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button_none" onclick="return confirm('Bạn muốn xóa bản ghi ?')">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif

          <div class="mt-3">
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<style type="text/css">
    .line-height{line-height: 71px;}
</style>




@endsection

@section('js')
<script>
$(function () {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  $(document).on('change', '.js-priority', function () {
    const $select = $(this);
    const id = $select.data('id');
    const priority = $select.val();
    const oldVal = $select.data('old') ?? priority;

    $select.prop('disabled', true);

    $.post("{{ url('admin/products') }}/" + id + "/priority", { priority: priority })
      .done(function (res) {
        if (res && res.ok) {
          $select.data('old', priority);
          // tuỳ bạn: reload để thấy đúng sắp xếp ngay
          window.location.reload();
        } else {
          alert('Cập nhật thất bại');
          $select.val(oldVal).trigger('change.select2');
        }
      })
      .fail(function (xhr) {
        alert(xhr.responseJSON?.message || 'Lỗi cập nhật');
        $select.val(oldVal).trigger('change.select2');
      })
      .always(function () {
        $select.prop('disabled', false);
      });
  });
});
</script>

@endsection