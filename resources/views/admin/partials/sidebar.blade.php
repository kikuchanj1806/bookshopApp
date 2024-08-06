<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/admin" class="logo">
                <img
                    src="{{ asset('assets/images/admin/logo_light.svg') }}"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="20"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Dashboard -->
                <li class="nav-item {{ $currentUrl == url('/admin') ? 'active' : '' }}">
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Category -->
                <li class="nav-item {{ str_starts_with($currentUrl, url('/admin/category')) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#categoryProduct">
                        <i class="fas fa-layer-group"></i>
                        <p>Danh mục sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse {{ str_starts_with($currentUrl, url('/admin/category')) ? 'show' : '' }}" id="categoryProduct">
                        <ul class="nav nav-collapse">
                            <li class="{{ $currentUrl == url('/admin/category/index') ? 'active' : '' }}">
                                <a href="/admin/category/index">
                                    <span>Danh sách danh mục</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/category/add') ? 'active' : '' }}">
                                <a href="/admin/category/add">
                                    <span>Thêm danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Product -->
                <li class="nav-item {{ str_starts_with($currentUrl, url('/admin/product')) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-layer-group"></i>
                        <p>Sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse {{ str_starts_with($currentUrl, url('/admin/product')) ? 'show' : '' }}" id="product">
                        <ul class="nav nav-collapse">
                            <li class="{{ $currentUrl == url('/admin/product/index') ? 'active' : '' }}">
                                <a href="/admin/product/index">
                                    <span>Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/product/add') ? 'active' : '' }}">
                                <a href="/admin/product/add">
                                    <span>Thêm sản phẩm</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Order -->
                <li class="nav-item {{ str_starts_with($currentUrl, url('/admin/order')) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#order">
                        <i class="fas fa-layer-group"></i>
                        <p>Đơn hàng</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse {{ str_starts_with($currentUrl, url('/admin/order')) ? 'show' : '' }}" id="order">
                        <ul class="nav nav-collapse">
                            <li class="{{ $currentUrl == url('/admin/order/index') ? 'active' : '' }}">
                                <a href="/admin/order/index">
                                    <span>Danh sách đơn hàng</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/order/add') ? 'active' : '' }}">
                                <a href="/admin/order/add">
                                    <span>Thêm đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- website -->
                <li class="nav-item {{ str_starts_with($currentUrl, url('/admin/website')) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#website">
                        <i class="fas fa-layer-group"></i>
                        <p>Website</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse {{ str_starts_with($currentUrl, url('/admin/website')) ? 'show' : '' }}" id="website">
                        <ul class="nav nav-collapse">
                            <li class="{{ $currentUrl == url('/admin/website/banners/index') ? 'active' : '' }}">
                                <a href="/admin/website/banners/index">
                                    <span>Banner</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/website/menu') ? 'active' : '' }}">
                                <a href="/admin/website/menu">
                                    <span>Menu</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/website/promotion') ? 'active' : '' }}">
                                <a href="/admin/website/promotion">
                                    <span>Promotion</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/website/setting') ? 'active' : '' }}">
                                <a href="/admin/website/setting">
                                    <span>Cài đặt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Setting -->
                <li class="nav-item {{ str_starts_with($currentUrl, url('/admin/setting')) ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#setting">
                        <i class="fas fa-layer-group"></i>
                        <p>Cài đặt</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse {{ str_starts_with($currentUrl, url('/admin/setting')) ? 'show' : '' }}" id="setting">
                        <ul class="nav nav-collapse">
                            <li class="{{ $currentUrl == url('/admin/user/index') ? 'active' : '' }}">
                                <a href="/admin/user/index">
                                    <span>Quản lý người dùng</span>
                                </a>
                            </li>
                            <li class="{{ $currentUrl == url('/admin/setting/general') ? 'active' : '' }}">
                                <a href="/admin/setting/general">
                                    <span>Cài đặt chung</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
