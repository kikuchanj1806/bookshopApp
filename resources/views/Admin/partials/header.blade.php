<div class="page-header">
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="fa-light fa-house"></i>
            </a>
        </li>
        <li class="separator">
            <i class="fa-light fa-angle-right"></i>
        </li>
        <li class="nav-item">
            <a href="{{ $route1 ?? '' }}">{{ $level1 ?? '' }}</a>
        </li>
        @if(isset($level2) && $level2)
            <li class="separator">
                <i class="fa-light fa-angle-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ $route2 ?? '#' }}">{{ $level2 ?? '' }}</a>
            </li>
        @endif
    </ul>
</div>
