<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="img/logo.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/dashboard.svg" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a class="active" href="index.html">Sales</a></li>
                <li><a href="index_2.html">Default</a></li>
                <li><a href="index_3.html">Dark Menu</a></li>
            </ul>
        </li>
        <li class>
            <a href="{{ route('user.all.booking') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/5.svg" alt>
                </div>
                <span>Bookings</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="img/menu-icon/10.svg" alt>
                </div>
                <span>Components</span>
            </a>
            <ul>
                <li><a href="accordion.html">Accordions</a></li>
                <li><a href="Scrollable.html">Scrollable</a></li>
                <li><a href="notification.html">Notifications</a></li>
                <li><a href="carousel.html">Carousel</a></li>
                <li><a href="Pagination.html">Pagination</a></li>
            </ul>
        </li>
    </ul>
</nav>
