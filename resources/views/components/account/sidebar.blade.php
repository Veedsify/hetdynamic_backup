<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                    <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Home</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Profile</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('account.setting') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Account</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Inbox</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('account.notification') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Notificaton</span>
            </a>
        </li>



    </ul>
</nav>
