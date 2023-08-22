<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('guest.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Guest List</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('roomtype.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Room Type</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('amenities.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Amenities</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('room.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Rooms</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('packages.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Packages</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('booking.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Room Books</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('payment.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Payment</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('employee.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Employee</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('all.report') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Report</span></a>

    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.logout') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

</ul>
