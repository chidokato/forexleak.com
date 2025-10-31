<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif


@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
 -->

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('error'))
<script>
Swal.fire({
    icon: 'error',
    // title: 'Thông báo',
    text: '{{ session('error') }}',
    confirmButtonText: 'Đã hiểu'
});
</script>
@endif

@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    // title: 'Thành công',
    text: '{{ session('success') }}'
});
</script>
@endif