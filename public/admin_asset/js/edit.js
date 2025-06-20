$(document).ready(function() {
    $('#addSectionButton').click(function() {
        var id = $(this).data('id');

        $.ajax({
            url: 'admin/section/add/' + id,
            type: 'GET',
            success: function(response) {
                // response là HTML của <tbody>
                $('#loadSection').html(response);
                console.log('Đã thêm Section và reload bảng thành công!');
            },
            error: function(xhr) {
                console.error('Lỗi khi thêm Section:', xhr.responseText);
                alert('Có lỗi khi thêm Section!');
            }
        });
    });
});

// Xử lý click nút Chỉnh sửa
$(document).on('click', '.click_view_section', function(event) {
    event.preventDefault();

    const url = $(this).data('url');

    fetch(url)
        .then(response => response.text())
        .then(html => {
            const viewSection = document.getElementById('view_section');
            const overlay = document.getElementById('overlay');

            viewSection.innerHTML = html;

            viewSection.classList.add('active');
            overlay.classList.add('active');

            // ⭐ Chỉ khởi tạo editor trong view_section
            initEditorInForm();

            // ⭐ Gắn sự kiện cho nút save sau khi load
            const saveBtn = $('#save_section');
            if (saveBtn.length) {
                saveBtn.on('click', function(e) {
                    e.preventDefault();

                    if (!window.contentEditor) {
                        alert('Editor chưa sẵn sàng, vui lòng đợi giây lát!');
                        return;
                    }

                    $('textarea[name="content_ss"]').val(window.contentEditor.getData());

                    const form = $('#form_section');
                    const url = form.attr('action');
                    const formData = new FormData(form[0]);

                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        success: function(response) {
                            console.log('Success:', response);
                            // alert('Lưu thành công!');
                            $('#view_section').removeClass('active');
                            $('#overlay').removeClass('active');

                            // ⭐⭐ Load lại danh sách section ⭐⭐
                            var postId = $('#form_section').data('post-id');

                            $.ajax({
                                url: 'admin/section/list/' + postId,
                                type: 'GET',
                                success: function(html) {
                                    $('#loadSection').html(html);
                                    console.log('Reload danh sách section thành công!');
                                },
                                error: function(xhr) {
                                    console.error('Lỗi reload danh sách section:', xhr.responseText);
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Lỗi:', xhr.responseText);
                            alert('Có lỗi xảy ra!');
                        }
                    });
                });
            }

            const closeBtn = document.getElementById('close_view_section');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    viewSection.classList.remove('active');
                    overlay.classList.remove('active');
                });
            }
        })
        .catch(error => console.error('Lỗi fetch:', error));
});



// Xử lý click overlay để đóng panel
document.getElementById('overlay').addEventListener('click', () => {
    document.getElementById('view_section').classList.remove('active');
    document.getElementById('overlay').classList.remove('active');
});



// Gắn sự kiện xoá Section (nên dùng .on để bind sau khi load ajax)
$(document).on('click', '.click_dell_section', function(e) {
    e.preventDefault();

    var url = $(this).data('url');
    var confirmDelete = confirm('Bạn có chắc muốn xoá Section này không?');

    if (!confirmDelete) return;

    $.ajax({
        url: url,
        type: 'GET',  // hoặc 'DELETE' nếu bạn xử lý theo REST
        success: function(response) {
            console.log('Xoá Section thành công!');

            // Lấy post_id từ nút Thêm Section (hoặc ở chỗ khác)
            var postId = $('#addSectionButton').data('id');

            // Reload lại danh sách section
            $.ajax({
                url: 'admin/section/list/' + postId,
                type: 'GET',
                success: function(html) {
                    $('#loadSection').html(html);
                    console.log('Reload danh sách section thành công!');
                },
                error: function(xhr) {
                    console.error('Lỗi reload danh sách section:', xhr.responseText);
                }
            });
        },
        error: function(xhr) {
            console.error('Lỗi khi xoá Section:', xhr.responseText);
            alert('Có lỗi khi xoá Section!');
        }
    });
});
