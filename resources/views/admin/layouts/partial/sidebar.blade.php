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
                <a href="{{route('admin.dashboard')}}" class="d-block">SDTL SOFTWARE</a>
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

                <li class="nav-item @yield('manage-branch')">
                    <a href="#" class="nav-link @yield('branch')">
                        {{-- <i class="nav-icon fas fa-tachometer-alt" style="font-size: 18px;"></i> --}}
                        <i class="fa-solid fa-layer-group" style="font-size: 18px;"></i>
                        <p>
                            Branch
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- @php
                        $adminStaff=Auth::guard('admin')->user()->branch_id==0;
                        @endphp --}}
                        @if (Auth::guard('admin')->user()->role == '1')
                            <li class="nav-item">
                                <a href="{{ route('admin.branch.index') }}" class="nav-link @yield('branch')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Branch</p>
                                </a>
                            </li>
                        @else
                            @php
                                $id = Auth::guard('admin')->user()->branch_id ?? 0;
                            @endphp
                            <li class="nav-item">
                                <a href="{{ route('admin.branch.edit', $id) }}" class="nav-link @yield('branch')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Branch</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item @yield('manage-nearby')">
                    <a href="#" class="nav-link @yield('nearby')">
                        <i class="fa-solid fa-signal" style="font-size: 18px;"></i>
                        <p>
                            Near By Request
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.nearbyRequest.index') }}" class="nav-link @yield('nearby')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Request List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('manage-balance')">
                    <a href="#" class="nav-link @yield('balance')">
                        <i class="fa fa-credit-card" style="font-size: 18px;"></i>
                        <p>
                            Regional Balance
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::guard('admin')->user()->branch_id != 1)
                        <li class="nav-item">
                            <a href="{{ route('admin.branchbalance.create') }}" class="nav-link @yield('balance_add')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Make Recharge</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('admin.branchbalance.index') }}" class="nav-link @yield('balance_index')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Recharge History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.branchbalance.courses.fees') }}" class="nav-link @yield('course_fees')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Courses Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.branchbalance.charge') }}" class="nav-link @yield('charge')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Payment Charge</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @yield('manage-batch')">
                    <a href="#" class="nav-link @yield('batch')">
                        <i class="fa-solid fa-table-list" style="font-size: 18px;"></i>
                        {{-- <i class="fa-solid fa-group-arrows-rotate" style="font-size: 18px;"></i> --}}
                        <p>
                            Batch
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.batch.create') }}" class="nav-link @yield('batch')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Batch Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.batch.index') }}" class="nav-link @yield('batch')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Batch List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.batch.closed') }}" class="nav-link @yield('batch')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Closed Batch</p>
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
                            <a href="{{ route('admin.admissionPayment.student') }}"
                                class="nav-link @yield('admissionPayment')">
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
                <!----Management Student End----->
                <li class="nav-item @yield('manage-regirter')">
                    <a href="#" class="nav-link @yield('regirter')">
                        <i class="fa-regular fa-address-card" style="font-size: 18px;"></i>
                        <p>
                            Registration
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.register.create') }}" class="nav-link @yield('regirter_add')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Registration Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.register.index') }}" class="nav-link @yield('regirter_history')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Registration History</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('manage-result')">
                    <a href="#" class="nav-link @yield('result')">
                        <i class="fa-solid fa-square-poll-horizontal" style="font-size: 18px;"></i>
                        <p>
                            Result Management
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.result.batch.search') }}" class="nav-link @yield('result_create')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Result Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.result.index') }}" class="nav-link @yield('result_info')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Result List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('manage-certificate')">
                    <a href="#" class="nav-link @yield('certificate')">
                        <i class="fa-solid fa-certificate" style="font-size: 18px;"></i>
                        <p>
                            Certificate
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::guard('admin')->user()->branch_id != 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.certificate.create') }}" class="nav-link @yield('certificate_create')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>New Request </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::guard('admin')->user()->role == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin.certificate.branch.search') }}" class="nav-link @yield('certificate_search')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Certificate Download </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('admin.certificate.index') }}" class="nav-link @yield('certificate_index')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Delivery History </p>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->user()->role == 1)
                        <li class="nav-item">
                            <a href="{{ route('admin.certificate.setting') }}" class="nav-link @yield('certificate_setting')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Certificate Setting </p>
                            </a>
                        </li>
                        @endif
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


                @if (Auth::guard('admin')->user()->role == '1')
                    <li class="nav-item @yield('manage-course')">
                        <a href="#" class="nav-link @yield('course')">
                            <i class="fa-solid fa-book-open-reader" style="font-size: 18px;"></i>
                            {{-- <i class="fa-solid fa-list" style="font-size: 18px;"></i> --}}
                            <p>
                                Course
                                <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.course.create') }}" class="nav-link @yield('course')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Course Create</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.course.index') }}" class="nav-link @yield('course')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Course List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.coursedetail.create') }}"
                                    class="nav-link @yield('course')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Course Details</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.course.subject.show') }}"
                                    class="nav-link @yield('course')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Course Subject</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.board.index') }}" class="nav-link @yield('board')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Board</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.session.index') }}" class="nav-link @yield('session')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Session</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.examination.index') }}" class="nav-link @yield('examination')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Examination</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
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
               <li class="nav-item @yield('manage-staff')">
                    <a href="#" class="nav-link @yield('staff')">
                        <i class="fa-solid fa-user" style="font-size: 18px;"></i>
                        <p>
                            Teacher
                            <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.staff.create') }}" class="nav-link @yield('staff')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Teacher Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.staff.index') }}" class="nav-link @yield('staff')">
                                <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                <p>Teacher List</p>
                            </a>
                        </li>
                    </ul>
                </li>

            <li class="nav-item @yield('manage-sms')">
                <a href="#" class="nav-link @yield('sms')">
                    <i class="fa-solid fa-message" style="font-size: 18px;"></i>
                    <p>
                        Message
                        <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.message.quick') }}" class="nav-link @yield('quick_sms')">
                            <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                            <p>Quick Message</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.message.birthday') }}" class="nav-link @yield('bday_sms')">
                            <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                            <p>Today Birthday</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.message.batch') }}" class="nav-link @yield('batch_sms')">
                            <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                            <p>Batch Message</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.smsgroup.index') }}" class="nav-link @yield('group_sms')">
                            <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                            <p>Group Message</p>
                        </a>
                    </li>
                </ul>
            </li>

                @if (Auth::guard('admin')->user()->role == '1')
                    <li class="nav-item">
                        <a href="{{ route('admin.gallery.index') }}" class="nav-link @yield('gallery')">
                            <i class="fa-solid fa-images" style="font-size: 18px;"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->role == '1')
                    <li class="nav-item @yield('manage-address')">
                        <a href="#" class="nav-link @yield('address')">
                            {{-- <i class="nav-icon fas fa-tachometer-alt" style="font-size: 18px;"></i> --}}
                            <i class="fa-solid fa-location-dot" style="font-size: 18px;"></i>
                            <p>
                                Location
                                <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.division.index') }}" class="nav-link @yield('address')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Division</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.district.index') }}" class="nav-link @yield('address')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>District</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.upazilla.index') }}" class="nav-link @yield('address')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Upazilla</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->role == '1')
                    <li class="nav-item @yield('manage-frontend')">
                        <a href="#" class="nav-link @yield('frontend')">
                            <i class="fa-solid fa-file" style="font-size: 18px;"></i>
                            <p>
                                Pages
                                <i class="right fas fa-angle-left" style="font-size: 12px;"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.service.index') }}" class="nav-link @yield('service')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Service</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.counter.index') }}" class="nav-link @yield('counter')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Counter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.achiveStudent.index') }}"
                                    class="nav-link @yield('achiveStudent')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Achive Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.event.index') }}" class="nav-link @yield('event')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Event</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.bannerSection.index') }}"
                                    class="nav-link @yield('bannerSection')">
                                    <i class="far fa-circle nav-icon" style="font-size: 8px;"></i>
                                    <p>Hero Section</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.setting.create') }}" class="nav-link @yield('setting')">
                            <i class="fa-solid fa-gear" style="font-size: 18px;"></i>
                            <p>
                                Setting
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
