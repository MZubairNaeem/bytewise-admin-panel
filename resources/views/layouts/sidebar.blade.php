<!-- ========== App Menu ========== -->
<style>
    .custom-sidebar-background {
        opacity: 1;
        background-color: rgb(78, 182, 102);
        /* Updated background color with opacity */
    }

    .navbar-menu {
        border-right: #d49167 1px solid;
    }

    /* .nav-link.menu-link,
    .menu-title {
        color: #243142 !important;
    } */

    .nav-link.menu-link.active,
    .menu-title.active {
        color: #f9f9f9 !important;
        background-color: #12316b !important;
    }

    .nav-link.menu-link:hover {
        color: #fff !important;
        background-color: #12316b !important;
    }
</style>
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>MENU</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('root') }}">
                        <i class="ri-dashboard-line"></i><span>Dashboard</span>
                    </a>
                </li>
                @canany(['Role', 'User'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('/group-link') ? 'active' : '' }}"
                        href="{{ route('view-links') }}">
                        <i class="ri-whatsapp-line"></i><span>WhatsApp Group Links</span>
                    </a>
                </li>
                @endcanany
                @canany(['Role', 'User'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('roles/*', 'user/list') ? 'active' : '' }}
                        "href="#userLayout"
                            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userLayout">
                            <i class="ri-team-line"></i> <span>User Management</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->is('roles/*', 'user/list') ? 'show' : '' }}"
                            id="userLayout">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('view-roles') }}"
                                        class="nav-link {{ request()->is('roles/list') ? 'active' : '' }}">
                                        <span>Roles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('user/list') ? 'active' : '' }}"
                                        href="{{ route('view-users') }}">
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->is('fellows/*') ? 'active' : '' }}
                        "href="#fellow"
                            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="fellow">
                            <i class="ri-group-line"></i> <span>Fellows Management</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->is('fellows/*') ? 'show' : '' }}" id="fellow">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('view-applied-fellows') }}"
                                        class="nav-link {{ request()->is('fellows/applied/*') ? 'active' : '' }}">
                                        <span>Applied</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('fellows/shortlist/*') ? 'active' : '' }}"
                                        href="{{ route('view-shortlisted-fellows') }}">
                                        <span>Shortlisted</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcanany
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('tracks/*') ? 'active' : '' }}" href="#tracks"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tracks">
                        <i class="ri-align-left"></i> <span>Tracks</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('tracks/*') ? 'show' : '' }}" id="tracks">
                        <ul class="nav nav-sm flex-column">
                            @can('Laravel')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 1) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/1') ? 'active' : '' }}">Laravel</a>
                                </li>
                            @endcan
                            @can('UI/UX')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 2) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/2') ? 'active' : '' }}">UI/UX</a>
                                </li>
                            @endcan
                            @can('Django')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 3) }}"
                                        class="nav-link  {{ request()->is('tracks/brands/list/3') ? 'active' : '' }}">Django</a>
                                </li>
                            @endcan
                            @can('Flask')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 4) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/4') ? 'active' : '' }} ">Flask</a>
                                </li>
                            @endcan
                            @can('Frontend')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 5) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/5') ? 'active' : '' }}">Frontend</a>
                                </li>
                            @endcan
                            @can('MERN')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 6) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/6') ? 'active' : '' }}">MERN</a>
                                </li>
                            @endcan
                            @can('Flutter')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 7) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/7') ? 'active' : '' }}">Flutter</a>
                                </li>
                            @endcan
                            @can('Data Engg')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 8) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/8') ? 'active' : '' }}">Data
                                        Engineering</a>
                                </li>
                            @endcan
                            @can('Cyber Security')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 9) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/9') ? 'active' : '' }}">Cyber
                                        Security</a>
                                </li>
                            @endcan
                            @can('C# .NET')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 10) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/10') ? 'active' : '' }}">C#
                                        .NET</a>
                                </li>
                            @endcan
                            @can('Data Science')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 11) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/11') ? 'active' : '' }}">Data
                                        Science</a>
                                </li>
                            @endcan
                            @can('NPM')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 12) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/12') ? 'active' : '' }}">NLP</a>
                                </li>
                            @endcan
                            @can('AWS')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 13) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/13') ? 'active' : '' }}">AWS</a>
                                </li>
                            @endcan
                            @can('Machine Learning/Deep Learning')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 14) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/14') ? 'active' : '' }}">Machine
                                        Learning/Deep Learning</a>
                                </li>
                            @endcan
                            @can('DevOps')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 15) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/15') ? 'active' : '' }}">DevOps</a>
                                </li>
                            @endcan
                            @can('Product Management')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 16) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/16') ? 'active' : '' }}">Product
                                        Management</a>
                                </li>
                            @endcan
                            @can('Game Dev')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 17) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/17') ? 'active' : '' }}">Game
                                        Development</a>
                                </li>
                            @endcan
                            @can('SEO')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 18) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/18') ? 'active' : '' }}">SEO</a>
                                </li>
                            @endcan
                            @can('React/Next')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 19) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/19') ? 'active' : '' }}">React/Next</a>
                                </li>
                            @endcan
                            @can('Android(Kotlin)')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 20) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/20') ? 'active' : '' }}">Android(Kotlin)</a>
                                </li>
                            @endcan
                            @can('Project Management')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 21) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/21') ? 'active' : '' }}">Project
                                        Management</a>
                                </li>
                            @endcan
                            @can('Azure')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 22) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/22') ? 'active' : '' }}">Azure</a>
                                </li>
                            @endcan
                            @can('iOS Dev')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 23) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/23') ? 'active' : '' }}">iOS
                                        Development</a>
                                </li>
                            @endcan
                            @can('Blockchain')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 24) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/24') ? 'active' : '' }}">Blockchain</a>
                                </li>
                            @endcan
                            @can('Personal & Profession Dev')
                                <li class="nav-item">
                                    <a href="{{ route('view-track-fellows', 25) }}"
                                        class="nav-link {{ request()->is('tracks/fellows/list/25') ? 'active' : '' }}">Personal
                                        & Profession Development</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('suppliers/list') ? 'active' : '' }}"
                        href="{{ route('view-suppliers-list') }}">
                        <i class=" ri-git-merge-line"></i> <span>Suppliers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('purchases/*') ? 'active' : '' }}"
                        href="{{ route('view-purchases-list') }}">
                        <i class="bx bx-purchase-tag-alt"></i> <span>Purchase</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('sales/*') ? 'active' : '' }}
                        "href="#salesLayout"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="salesLayout">
                        <i class="ri-coins-line"></i> <span>Sales</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('sales/*') ? 'show' : '' }}"
                        id="salesLayout">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('view-sales-list') }}"
                                    class="nav-link {{ request()->is('sales/list') ? 'active' : '' }}">Sales</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('view-quotations-list') }}"
                                    class="nav-link {{ request()->is('/sales/quotations/*') ? 'active' : '' }}">Qutation</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('returns/*') ? 'active' : '' }}"
                        href="#returnsLayout" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="returnsLayout">
                        <i class="ri-repeat-line"></i><span>Returns</span>
                    </a>
                    <div class="collapse mesnu-dropdown {{ request()->is('returns/purchases/*', 'returns/sales/*') ? 'show' : '' }}"
                        id="returnsLayout">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('view-sales-returns-list') }}"
                                    class="nav-link {{ request()->is('returns/sales/list') ? 'active' : '' }}">Sales
                                    Returns</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('view-purchases-returns-list') }}"
                                    class="nav-link {{ request()->is('returns/purchases/list') ? 'active' : '' }}">Purchase
                                    Returns</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('expenses/*') ? 'active' : '' }}"
                        href="#expensesLayout" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="expensesLayout">
                        <i class="ri-align-left"></i> <span>Expenses</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('expenses/*') ? 'show' : '' }}"
                        id="expensesLayout">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('view-expenses-list') }}"
                                    class="nav-link {{ request()->is('expenses/expenses/list') ? 'active' : '' }}">Expenses</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('view-expenses-categories-list') }}"
                                    class="nav-link {{ request()->is('expenses/categories/list') ? 'active' : '' }}">Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('reports/list') ? 'active' : '' }}"
                        href="{{ route('view-reports-list') }}">
                        <i class="ri-file-text-line"></i> <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('warehouses/list') ? 'active' : '' }}"
                        href="{{ route('view-warehouses-list') }}">
                        <i class="las la-warehouse"></i> <span>Warehouse</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link
                    {{ request()->is('inventory') ? 'active' : '' }}
                    "
                        href="{{ route('view-inventory') }}">
                        <i class="las la-boxes"></i> <span>Inventory</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link
                    {{ request()->is('settings') ? 'active' : '' }}
                    "
                        href="{{ route('view-settings') }}">
                        <i class='bx bx-cog'></i> <span>Settings</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<script>
    function collapseDropdown(id) {
        // Collapse the dropdown
        document.getElementById(id).classList.remove('show');
    }
</script>
