<!-- top header part start -->
<div>
    <div class="border-b-2 border-main">
        <div class="md:container">
            <div class="flex items-center">
                <div class="px-4 bg-main py-1">
                    <h2 class="text-white lg:text-xl text-lg font-normal font-trio-bangla">
                        নোটিশ
                    </h2>
                </div>
                <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()"
                    class="text-base text-black font-semibold">{{ get_setting('notice')->value ?? 'Null' }}
                </marquee>
            </div>
        </div>
    </div>
    <!-- follow us div -->
    <div class="bg-main text-white mt-[2px]">
        <div class="container">
            <div class="flex items-center lg:justify-between lg:flex-row flex-col gap-2 w-full py-1">
                <p class="flex items-center gap-x-2 font-open-sans">
                    <i class="fa-regular fa-envelope"></i>
                    <span class="font-medium text-base">{{ get_setting('email')->value ?? 'Null' }}</span>
                </p>
                <div class="flex items-center gap-x-4 font-open-sans">
                    <span class="text-base font-semibold">Follow Us: </span>
                    <ul class="flex items-center gap-x-4">
                        @php
                            $fb_url = get_setting('facebook_link')->value ?? 'Null';
                            $tube_url = get_setting('youtube_link')->value ?? 'Null';
                            $linkedin_url = get_setting('linkedin')->value ?? 'Null';
                            $pinterest_url = get_setting('pintarest')->value ?? 'Null';
                        @endphp
                        <li>
                            <a href="{{ url($fb_url) }}"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="{{ url($tube_url) }}"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                        {{-- <li>
                            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                        </li> --}}
                        <li>
                            <a href="{{ url($linkedin_url) }}"><i class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="{{ url($pinterest_url) }}"><i class="fa-brands fa-pinterest-p"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- top header part end -->

<!-- navbar part start  -->
<header id="header" class="bg-white border-b border-border lg:drop-shadow-xl py-1 duration-300 ease-in">
    <div class="container">
        <nav class="flex justify-between items-center bg-white">
            <div>
                @php
                    $logo = get_setting('header_logo');
                @endphp
                <a href="{{ url('/') }}">
                    @if ($logo != null)
                    <img src="{{ asset(get_setting('header_logo')->value) }}" alt=""
                        class="lg:w-[70px] md:w-[65px] w-[60px] w-[60px] logo" />
                    @else
                    <img src="{{ asset('frontend/img/logo.png') }}" alt=""
                        class="lg:w-[70px] md:w-[65px] w-[60px] w-[60px] logo" />
                    @endif
                </a>
            </div>
            <div class="hidden lg:block">
                <div class="navbar-wrap">
                    <ul
                        class="flex md:flex-row flex-col md:items-center xl:gap-2 z-50 bg-white w-full z-50 bg-white py-10 lg:py-0 pl-3 lg:pl-0">
                        <li class="active">
                            <a class="nav-link text-clip lg:text-sm xl:text-lg lg:text-sm"
                                href="{{ url('/') }}">Home
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg"
                                href="{{ route('gallaryPage') }}">Gallery</a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg"
                                href="{{ route('coursePage') }}">Courses</a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg" href="{{ route('aboutPage') }}">About
                                Us</a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg"
                                href="{{ route('contactPage') }}">Contact Us</a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg"
                                href="{{ route('eventPage') }}">Event</a>
                        </li>
                        <li>
                            <a class="nav-link text-clip lg:text-sm xl:text-lg"
                                href="{{ route('center.create') }}">Centre Registration</a>
                        </li>
                        <li id="resultBtn">
                            <button class="px-5 py-2 text-clip rounded-sm text-[18px] hover:bg-primary duration-300">Result</button>
                        </li>
                        <li id="admissionBtn">
                            <button class="px-5 py-2 bg-main text-white rounded-sm text-[18px] hover:bg-primary duration-300">Admission</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:flex hidden items-center gap-5 ">
                 @if (Auth::guard('student')->check())
                    <a   href="{{ route('dashboard') }}" class="px-5 py-2 bg-main text-white rounded-sm text-[18px] hover:bg-primary duration-300">
                        Dashboard
                    </a>
                @else
                    <button id="openOverlayBtn"
                        class="px-5 py-2 bg-main text-white rounded-sm text-[18px] hover:bg-primary duration-300">
                        Login
                    </button>
                @endif

                <a href="{{ route('cart.index') }}"
                    class="w-[45px] h-[45px] leading-[45px]  duration-300 hover:bg-main hover:text-white border border-main rounded-full text-main flex items-center justify-center text-base relative">
                    <i class="fa-solid fa-bag-shopping"></i>

                    <span
                        class="cartCount w-[22px] h-[22px] bg-black text-white rounded-full leading-[22px] text-center font-open-sans text-[12px] absolute -top-[6px] left-[27px]">0</span>
                </a>
            </div>


            <!-- mobile menu show -->
            <div class="flex items-center gap-6 lg:hidden">
                <button id="resultBtn2"
                    class="px-5 py-2  text-clip rounded-sm text-base hover:bg-primary duration-300">
                    Result
                </button>
                <button id="admissionBtn2"
                    class="px-5 py-2  text-clip rounded-sm text-base hover:bg-primary duration-300">
                    Admission
                </button>
                
                @if (Auth::guard('student')->check())
                    <a   href="{{ route('dashboard') }}" class="px-5 py-2 bg-main text-white rounded-sm text-base hover:bg-primary duration-300">
                        Dashboard
                    </a>
                @else
                    <button id="openOverlayBtn2"
                    class="px-5 py-2 bg-main text-white rounded-sm text-base hover:bg-primary duration-300">
                        Login
                    </button>
                @endif
                
                 

                <!--<a href="{{ route('cart.index') }}"-->
                <!--    class="w-[45px] h-[45px] leading-[45px]  duration-300 hover:bg-main hover:text-white border border-main rounded-full text-main flex items-center justify-center text-base relative">-->
                <!--    <i class="fa-solid fa-bag-shopping"></i>-->

                <!--    <span-->
                <!--        class="cartCount w-[22px] h-[22px] bg-black text-white rounded-full leading-[22px] text-center font-open-sans text-[12px] absolute -top-[6px] left-[27px]">0</span>-->
                <!--</a>-->
                <button id="toggleMobileMenu">
                    <div class="text-3xl text-bgray-900">
                        <span id="menuIcon" class="fa-solid fa-bars text-black"></span>
                    </div>
                </button>
            </div>
        </nav>
    </div>

    <!-- mobile menu bar start  -->
    <div id="mobileMenu"
        class="h-screen w-9/12 fixed inset-y-0 left-0 z-40 bg-gray-100 transition-transform -translate-x-full border-e">
        <div class="pt-8 flex justify-center">
            <a href="index.html">
                <img src="./img/logo.png" alt="" class="w-[70px]" />
            </a>
        </div>

        <div class="flex h-screen flex-col justify-between">
            <ul class="py-10">
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla active"
                        href="{{ url('/') }}">হোম
                    </a>
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('gallaryPage') }}">গ্যালারী</a>
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('coursePage') }}">কোর্সসমূহ</a>
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('aboutPage') }}">আমাদের সর্ম্পকে</a>
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('contactPage') }}">যোগাযোগ করুন</a>
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('eventPage') }}">ইভেন্ট  </a> 
                </li>
                <li class="py-3 px-6 border-b border-[#eaeaea]">
                    <a class="hover:text-main nav-link hover:font-semibold text-xl font-trio-bangla"
                        href="{{ route('center.create') }}"> সেন্টার রেজিস্ট্রেশন</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- mobile menu bar end lg:here -->
</header>
<!-- navbar part end -->