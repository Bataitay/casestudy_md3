<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here...">
                            </div>
                            <button type="submit"> <img src="{{ asset('assets/img/icon/icon_search.svg') }}"
                                    alt=""> </button>
                        </form>
                    </div>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a class="bell_notification_clicker" href="#"> <img
                                    src="{{ asset('assets/img/icon/bell.svg') }}" alt="">
                                <span>04</span>
                            </a>

                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/2.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Directory </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/4.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/3.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/2.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Cool Directory </h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/4.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>Awesome packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>

                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="{{ asset('assets/img/staf/3.png') }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#">
                                                <h5>what a packages</h5>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li>
                            <a class="CHATBOX_open" href="#"> <img src="{{ asset('assets/img/icon/msg.svg') }}"
                                    alt=""> <span>01</span> </a>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="{{ asset('assets/img/client_img.png') }}" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <h5>{{ Auth::user()->name ?? 'user_name' }} </h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="#">My Profile </a>
                                <a href="#">Settings</a>
                                    <form method="POST" action="{{ route('logout') }}" class="bottom-10">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                            <i class="feather icon-log-out m-r-5"></i> {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
