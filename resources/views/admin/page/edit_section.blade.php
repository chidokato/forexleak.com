<form id="form_section" method="POST" action="{{ route('section.update', $section->id) }}" enctype="multipart/form-data" data-post-id="{{$section->Post->id}}">
    @csrf
    <div class="section" >
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="">Name</label>
                    <input value="{{$section->heading}}" name="heading" placeholder="..." type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="">Hình ảnh</label>
                    <input name="img_ss" placeholder="..." type="file" class="mt-1">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <img class="img100" src="data/images/{{$section->img}}">
            </div>
            <div class="col-md-12">
                <textarea rows="" name="content_ss" class="form-control editor">{!! $section->content !!}</textarea>
            </div>
        </div>
    </div>
    <button type="button" id="save_section" class="btn btn-primary">Lưu lại</button>
</form>

