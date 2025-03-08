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
                <a href="#" class="d-block">SDTL
                    System</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-th" style="font-size: 18px;"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('manage-attendance')">
                    <a href="#" class="nav-link @yield('attendance')">
                        <i class="fa-solid fa-clipboard-user" style="font-size: 18px;"></i>
                        <p>
                            Attendance
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.attendances.create') }}" class="nav-link @yield('create')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Attendance Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.attendances.index') }}" class="nav-link @yield('index')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Attendance List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!----Management Student----->
                <li class="nav-item @yield('manage-student')">
                    <a href="#" class="nav-link @yield('batch')">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 18px;"></i>
                        <p>
                            Manage Student
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.student.create') }}" class="nav-link @yield('admission')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.student.index') }}" class="nav-link @yield('admission')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Student list</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.admissionPayment.student') }}" class="nav-link @yield('admissionPayment')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Payment & Money receipt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.student.download.search') }}" class="nav-link @yield('download')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Download</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.student.duelist') }}" class="nav-link @yield('duelist')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Due list</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.student.due.search') }}" class="nav-link @yield('due_download')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Due Download</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('manage-notefile')">
                    <a href="#" class="nav-link @yield('notefile')">
                        <i class="fa-solid fa-file-zipper" style="font-size: 18px;"></i>
                        <p>
                            File/Note
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.file.index') }}" class="nav-link @yield('index')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Necessary File</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.file.create') }}" class="nav-link @yield('create')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Send/Save File</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.file.branchfile') }}" class="nav-link @yield('branchfile')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Show File</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('manage-exam')">
                    <a href="#" class="nav-link @yield('exam')">
                        <i class="fa-solid fa-hexagon-nodes-bolt" style="font-size: 18px;"></i>
                        <p>
                            Exam
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.written-exams.index') }}" class="nav-link @yield('written-exam')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Written Exam List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mcq-exams.index') }}" class="nav-link @yield('mcq-list')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>MCQ / Quiz List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mcq.result.list') }}" class="nav-link @yield('mcq-result')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>MCQ Result List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.all-exam.result.list') }}" class="nav-link @yield('all-exam-result')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p> Exam Result List</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
