<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @php
                $fav_icon = get_setting('fav_icon')->value;
            @endphp
            <div class="image">
                <img src="{{ asset($fav_icon) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">SDTL SOFTWARE</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-th" style="font-size: 18px;"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('written-exam.list') }}" class="nav-link @yield('exam-list')">
                        <i class="fa-solid fa-hexagon-nodes-bolt" style="font-size: 18px;"></i>
                        <p>
                            Exam
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('exam-result.list') }}" class="nav-link @yield('result-list')">
                        <i class="fa-solid fa-square-poll-horizontal" style="font-size: 18px;"></i>
                        <p>
                            Result View
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link @yield('profile')">
                        <i class="fa-solid fa-user" style="font-size: 18px;"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('manage-course')">
                    <a href="#" class="nav-link @yield('course')">
                        <i class="fa-solid fa-book-open-reader" style="font-size: 18px;"></i>
                        <p>
                            Course
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($coursedetails as $item)
                        <li class="nav-item">
                            <a href="{{ route('course', str_replace(' ', '_', $item->header_title)) }}" class="nav-link @yield('course')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>{{ $item->header_title ?? '' }}</p>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </li>
{{--                 <li class="nav-item">--}}
{{--                    <a href="{{ route('student.payment') }}" class="nav-link @yield('result')">--}}
{{--                        <i class="fa-solid fa-money-check-dollar" style="font-size: 18px;"></i>--}}
{{--                        <p>--}}
{{--                            Payment Info--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('admitcard') }}" class="nav-link @yield('result')">
                        <i class="fa-solid fa-id-card" style="font-size: 18px;"></i>
                        <p>
                            Admit Card
                        </p>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a href="#" class="nav-link @yield('result')">-->
                <!--        <i class="fa-regular fa-address-card" style="font-size: 18px;"></i>-->
                <!--        <p>-->
                <!--            Registration Card-->
                <!--        </p>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a href="{{ route('resultCard') }}" class="nav-link @yield('result')">
                        <i class="fa-solid fa-square-poll-horizontal" style="font-size: 18px;"></i>
                        <p>
                            Result Card
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('all.message') }}" class="nav-link @yield('message')">
                        <i class="fa-solid fa-message" style="font-size: 18px;"></i>
                        <p>
                            Message
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
