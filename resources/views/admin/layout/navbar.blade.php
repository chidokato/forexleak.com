<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> -->
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="admin/main">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- <hr class="sidebar-divider"> -->
    <!-- <div class="sidebar-heading">Interface</div> -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Danh mục</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('post.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Bài viết</span></a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link" href="{{route('page.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Trang</span></a>
    </li>
    
   
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer"
            aria-expanded="true" aria-controls="customer">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Khách hàng</span>
        </a>
        <div id="customer" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="{{route('cart.index')}}">Đơn hàng</a> -->
                <a class="collapse-item" href="{{route('customer.index')}}">Data</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
            aria-expanded="true" aria-controls="setting">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cấu hình</span>
        </a>
        <div id="setting" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('setting.index')}}">Setting</a>
                <a class="collapse-item" href="{{route('menu.index')}}">Menus</a>
                <!-- <a class="collapse-item" href="{{route('option.index')}}">Tùy chọn</a> -->
                <a class="collapse-item" href="{{route('slider.show', 'slider')}}">Slider</a>
                <a class="collapse-item" href="{{route('slider.show', 'banner')}}">Banner</a>
            </div>
        </div>
    </li>
   
   
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}"><i class="fas fa-fw fa-chart-area"></i><span>Người dùng</span></a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>