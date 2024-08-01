<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="../index.html" class="logo">
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
                <li class="nav-item">
                    <a
                        data-bs-toggle="collapse"
                        href="/admin/dashboard"
                        class="collapsed"
                        aria-expanded="false"
                    >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                    <h4 class="text-section"></h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#categoryProduct">
                        <i class="fas fa-layer-group"></i>
                        <p>Danh mục sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse" id="categoryProduct">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/category/index">
                                    <span>Danh sách danh mục</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/category/add">
                                    <span>Thêm danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#product">
                        <i class="fas fa-layer-group"></i>
                        <p>Sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse" id="product">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/product/index">
                                    <span>Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/add">
                                    <span>Thêm sản phẩm</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#order">
                        <i class="fas fa-layer-group"></i>
                        <p>Đơn hàng</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse" id="order">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/product/index">
                                    <span>Danh sách đơn hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/add">
                                    <span>Thêm đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#website">
                        <i class="fas fa-layer-group"></i>
                        <p>Website</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse" id="website">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/website/banners/index">
                                    <span>Banner</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/add">
                                    <span>Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/add">
                                    <span>Promotion</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/product/add">
                                    <span>Cài đặt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#setting">
                        <i class="fas fa-layer-group"></i>
                        <p>Cài đặt</p>
                        <span class="caret"></span>
                    </a>
                    <div class="ms-4 collapse" id="setting">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/user/index">
                                    <span>Quản lý người dùng</span>
                                </a>
                            </li>

                            <li>
                                <a href="/admin/product/index">
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
