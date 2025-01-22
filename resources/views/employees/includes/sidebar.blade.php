<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{ route("admin-home") }} class="brand-link">
        <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href={{ route("admin-home") }} class="nav-link {{ Request::is('secretgate/dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        href="#"
                        class="nav-link 
                            {{ Request::is('secretgate/testimonials', 'secretgate/testimonials/*') 
                            || Request::is('secretgate/heroes', 'secretgate/heroes/*') 
                            || Request::is('secretgate/about', 'secretgate/about/*') 
                            || Request::is('secretgate/value', 'secretgate/value/*') 
                            || Request::is('secretgate/statistiks', 'secretgate/statistiks/*') 
                            || Request::is('secretgate/benefits', 'secretgate/benefits/*') 
                            || Request::is('secretgate/others', 'secretgate/others/*') 
                            ? 'active' : ''}}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("clients.index") }}" class="nav-link {{ Request::is('secretgate/clients*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Client Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("companies.index") }}" class="nav-link {{ Request::is('secretgate/companies*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Company Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("values.index") }}" class="nav-link {{ Request::is('secretgate/values*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Value Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("works.index") }}" class="nav-link {{ Request::is('secretgate/works*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Work Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("directors.index") }}" class="nav-link {{ Request::is('secretgate/directors*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Director Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("testimonials.index") }}" class="nav-link {{ Request::is('secretgate/testimonials*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonial Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin-others-section") }}" class="nav-link {{ Request::is('secretgate/others*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Others</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a 
                        href="#"
                        class="nav-link 
                            {{ Request::is('secretgate/contacts', 'secretgate/contacts/*') 
                            || Request::is('secretgate/sosmeds ', 'secretgate/sosmeds/*') 
                            || Request::is('secretgate/partners ', 'secretgate/partners/*') 
                            ? 'active' : ''}}">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>
                            Contact Detail
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("contacts.index") }}" class="nav-link {{ Request::is('secretgate/contacts*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("sosmeds.index") }}" class="nav-link {{ Request::is('secretgate/sosmeds*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Media</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
