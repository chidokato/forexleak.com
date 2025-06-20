@foreach($sections as $key => $val)
<tr id="post">
    <input type="hidden" name="id" id="id" value="{{$val->id}}">
    <td>
        <div class="name">{{$val->heading}}</div>
    </td>
    <td style="display: flex;">
        <button data-url="admin/section/edit/{{$val->id}}" type="button" class="button_none click_view_section">
            <i class="fas fa-edit" aria-hidden="true"></i> Chỉnh sửa
        </button>
        <button data-url="admin/section/dell/{{$val->id}}" type="button" class="button_none click_dell_section ml-3"><i class="fas fa-trash-alt" aria-hidden="true"></i> Xóa</button>
    </td>
</tr>
@endforeach