<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <!--<li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>-->

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                    </span>
                <span>
                                        <span class="account-user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        <span class="account-position">Dashboard</span>
                                    </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
{{--                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                    <i class="mdi mdi-account-circle me-1"></i>--}}
{{--                    <span>My Account</span>--}}
{{--                </a>--}}

                <!-- item-->
                <a href="{{url('logout')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
    @if(Auth::user()->role != 'minister' && Auth::user()->role != 'operations')
    <div class="app-search dropdown d-none d-lg-block">
        <form id="cnicForm" action="" method="get" onsubmit="encryptCNIC(event)" data-user-role="{{ Auth::user()->role }}">
            <div class="input-group">
                <input type="text" id="cnic" class="form-control" placeholder="Search by CNIC#" minlength="13" maxlength="13" required>
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    @endif
</div>
