<header id="header">
    <div class="header-top">
        <div class="header-top-inner">
            <img src="https://hoang-phuc.com/media/wysiwyg/240319_Voucher-Extra_Homepage_Top-Banner_Desktop.gif"
                 alt="headerTop image">
        </div>
    </div>
    <div class="header-main">
        <div class="container">
            <div class="header-main-inner">
                <div class="header-logo">
                    <a href="/"><img src="/assets/images/logo.png" alt="header logo"></a>
                </div>
                <div class="header-search-desktop">
                    <div class="form-search-control">
                        <form class="form-search" action="/search" method="GET">
            <span class="header-search-back d-lg-none d-xl-none">
                <i class="fa-regular fa-angle-left"></i>
            </span>
                            <span class="header-search-icon">
                <i class="fa-light fa-magnifying-glass"></i>
            </span>
                            <input type="text" class="form-control" id="inputSearch" name="query" placeholder="Tìm kiếm sản phẩm...">
                            <button class="search-btn" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="search-autocomplete">
                        <div class="suggestion-container">
                            <div class="suggestion-content">
                                <div class="suggestion-title">
                                    <h3 id="suggestion-title">Gợi ý tìm kiếm</h3>
                                </div>
                                <div class="suggestion-options">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-right-links">
                    <div class="header-right-item search-item d-lg-none">
                        <a href="#">
                            <span class="hri-icon">
                                <i class="fa-light fa-magnifying-glass"></i>
                            </span>
                        </a>
                    </div>
                    <div class="header-right-item cart-item">
                        <a href="#">
        <span class="hri-icon">
            <i class="fa-light fa-cart-shopping"></i>
            <span class="cart-qty">0</span>
        </span>
                            <div class="hri-content">
                                <span>Giỏ hàng</span>
                                <span class="label"><span class="cart-qty">0</span> sản phẩm</span>
                            </div>
                        </a>
                    </div>
                    <div class="header-right-item menu-item d-lg-none">
                        <a href="#">
                            <span class="hri-icon open-nav">
                                <i class="fa-light fa-bars"></i>
                            </span>
                            <span class="hri-icon cls-nav">
                                <i class="fa-light fa-xmark"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-nav">
                <ul class="megamenu">
                    @foreach ($menuCategories as $category)
                        <li class="has-dropdown">
                            <a href="{{ route('category.products', $category->slug) }}">
                                @if($category->icon)
                                    <img src="{{ asset($category->icon) }}" alt="{{ $category->name }}"
                                         style="width: 20px"/>
                                @endif
                                <span>{{ $category->name }}</span>
                            </a>
                            @if ($category->children->isNotEmpty())
                                <div class="submenu">
                                    <ul>
                                        @foreach ($category->children as $child)
                                            <li>
                                                <a href="{{ route('category.products', $child->slug) }}">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="underHeader"></div>
