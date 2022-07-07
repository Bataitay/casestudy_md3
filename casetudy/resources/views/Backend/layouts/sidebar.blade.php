<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
    <a href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
    <i class="ti-close"></i>
    </div>
    </div>
    <ul id="sidebar_menu">
    <li class="mm-active">
    <a class="has-arrow" href="#" aria-expanded="false">

    <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
    <span>Dashboard</span>
    </a>

    </li>
    <li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/2.svg') }}" alt="">
    <span>Giao diện</span>
    </a>
    <ul>
    <li><a href="login.html">Login</a></li>
    <li><a href="resister.html">Register</a></li>
    </ul>
    </li>
    <li class="">
    <a class="has-arrow" href="{{ route('category.index') }}" >
    <img src="{{ asset('assets/img/menu-icon/3.svg') }}" alt="">
    <span>Danh mục</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="{{ route('product.index') }}" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/4.svg') }}" alt="">
    <span>Sản phẩm</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/5.svg') }}" alt="">
    <span>Đơn hàng</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
    <span>Data Khách hàng</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="{{ route('notify.create')}}" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/7.svg') }}" alt="">
    <span>Thông báo</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="{{ route('home.index') }}" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
    <span>Cấp quyền</span>
    </a>
    <ul>
    <li><a href="data_table.html">Data Tables</a></li>
    <li><a href="bootstrap_table.html">Grid Tables</a></li>
    </ul>
    </li>
    <li class="">
    <a class="has-arrow" href="/chat" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/9.svg') }}" alt="">
    <span>Tin nhắn</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="{{route('employee.index')}}" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/10.svg') }}" alt="">
    <span>Nhân viên</span>
    </a>
    </li>
    <li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
    <img src="{{ asset('assets/img/menu-icon/map.svg') }}" alt="">
    <span>Maps</span>
    </a>
    <ul>
    <li><a href="mapjs.html">Maps JS</a></li>
    <li><a href="vector_map.html">Vector Maps</a></li>
    </ul>
    </li>
    </ul>
    </nav>
