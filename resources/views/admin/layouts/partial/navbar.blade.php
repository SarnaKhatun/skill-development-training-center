<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" target="_blank" class="nav-link">Website</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-envelope" style="color:rgb(252, 148, 29);font-size:30px"></i>
                <span class="badge badge-dark navbar-badge">{{ Auth::user()->branch->sms  ?? ''}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <h6 style="font-weight:bolder;color:rgb(2, 2, 2)">{{ Auth::user()->branch->institute_name_en ?? ''}} <span
                        >({{ Auth::user()->branch->center_code ?? ''}})</span></h6>
                {{-- <img src="{{ asset('backend') }}/dist/img/user3-128x128.jpg" alt="User Avatar" class="rounded-circle" width="40px;" style="margin-top: -7px;"> --}}
            </a>
            @if (isset(Auth::user()->branch_id) != 1)
                <p class="text-center">Ballance: <span class="bg-success"
                        style="padding: 3px 10px;
                border-radius: 3px;">{{ Auth::user()->branch->registration_balance ?? ''}}</span>
                </p>
            @endif
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 @if (Auth::guard('admin')->user()->role == '1' || Auth::guard('admin')->user()->role == '2')
                <a class="dropdown-item" href="{{ route('admin.branch.show', Auth::user()->branch_id ?? '') }}">
                    <i class="fas fa-user-circle"></i>
                    Profile</a>
                <a class="dropdown-item" href="{{ route('admin.branch.edit', Auth::user()->branch_id ?? '') }}">
                    <i class="fas fa-tools"></i>
                    Setting</a>
                     <a class="dropdown-item" href="{{ route('admin.password.page') }}">
                    <i class="fas fa-unlock-alt"></i>
                    Change Password</a>
                @endif
                @if (Auth::guard('admin')->user()->role == '1')
                    <a class="dropdown-item" data-toggle="modal" data-target="#add-sms" style="cursor: pointer">
                        <i class="fa-solid fa-message"></i>
                        Add SMS</a>
                @endif

                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <form action="{{ route('admin.logout') }}" id="logout-form" method="post" class="d-none">@csrf
                    </form>
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>


<!-- Modal -->
<div class="modal fade" id="add-sms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add SMS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.branchbalance.message_rechrge.admin') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Total SMS<small class="text-danger">*</small></label>
                                <input type="text" name="total_sms" value="{{ old('total_sms') }}"
                                    class="form-control custom_form_control" id="" required>
                                <span class="text-danger">
                                    @error('total_sms')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
