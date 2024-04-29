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
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="17">
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
                    <a class="nav-link menu-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('root')); ?>">
                        <i class="ri-dashboard-line"></i><span>Dashboard</span>
                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['Role', 'User'])): ?>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->is('/group-link') ? 'active' : ''); ?>"
                        href="<?php echo e(route('view-links')); ?>">
                        <i class="ri-whatsapp-line"></i><span>WhatsApp Group Links</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['Role', 'User'])): ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->is('roles/*', 'user/list') ? 'active' : ''); ?>

                        "href="#userLayout"
                            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="userLayout">
                            <i class="ri-team-line"></i> <span>User Management</span>
                        </a>
                        <div class="collapse menu-dropdown <?php echo e(request()->is('roles/*', 'user/list') ? 'show' : ''); ?>"
                            id="userLayout">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-roles')); ?>"
                                        class="nav-link <?php echo e(request()->is('roles/list') ? 'active' : ''); ?>">
                                        <span>Roles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(request()->is('user/list') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('view-users')); ?>">
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link <?php echo e(request()->is('fellows/*') ? 'active' : ''); ?>

                        "href="#fellow"
                            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="fellow">
                            <i class="ri-group-line"></i> <span>Fellows Management</span>
                        </a>
                        <div class="collapse menu-dropdown <?php echo e(request()->is('fellows/*') ? 'show' : ''); ?>" id="fellow">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-applied-fellows')); ?>"
                                        class="nav-link <?php echo e(request()->is('fellows/applied/*') ? 'active' : ''); ?>">
                                        <span>Applied</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e(request()->is('fellows/shortlist/*') ? 'active' : ''); ?>"
                                        href="<?php echo e(route('view-shortlisted-fellows')); ?>">
                                        <span>Shortlisted</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(request()->is('tracks/*') ? 'active' : ''); ?>" href="#tracks"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tracks">
                        <i class="ri-align-left"></i> <span>Tracks</span>
                    </a>
                    <div class="collapse menu-dropdown <?php echo e(request()->is('tracks/*') ? 'show' : ''); ?>" id="tracks">
                        <ul class="nav nav-sm flex-column">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Laravel')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 1)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/1') ? 'active' : ''); ?>">Laravel</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('UI/UX')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 2)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/2') ? 'active' : ''); ?>">UI/UX</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Django')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 3)); ?>"
                                        class="nav-link  <?php echo e(request()->is('tracks/brands/list/3') ? 'active' : ''); ?>">Django</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Flask')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 4)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/4') ? 'active' : ''); ?> ">Flask</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Frontend')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 5)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/5') ? 'active' : ''); ?>">Frontend</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MERN')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 6)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/6') ? 'active' : ''); ?>">MERN</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Flutter')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 7)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/7') ? 'active' : ''); ?>">Flutter</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Data Engg')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 8)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/8') ? 'active' : ''); ?>">Data
                                        Engineering</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Cyber Security')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 9)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/9') ? 'active' : ''); ?>">Cyber
                                        Security</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('C# .NET')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 10)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/10') ? 'active' : ''); ?>">C#
                                        .NET</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Data Science')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 11)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/11') ? 'active' : ''); ?>">Data
                                        Science</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('NPM')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 12)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/12') ? 'active' : ''); ?>">NLP</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('AWS')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 13)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/13') ? 'active' : ''); ?>">AWS</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Machine Learning/Deep Learning')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 14)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/14') ? 'active' : ''); ?>">Machine
                                        Learning/Deep Learning</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('DevOps')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 15)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/15') ? 'active' : ''); ?>">DevOps</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Product Management')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 16)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/16') ? 'active' : ''); ?>">Product
                                        Management</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Game Dev')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 17)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/17') ? 'active' : ''); ?>">Game
                                        Development</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SEO')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 18)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/18') ? 'active' : ''); ?>">SEO</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('React/Next')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 19)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/19') ? 'active' : ''); ?>">React/Next</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Android(Kotlin)')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 20)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/20') ? 'active' : ''); ?>">Android(Kotlin)</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Project Management')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 21)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/21') ? 'active' : ''); ?>">Project
                                        Management</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Azure')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 22)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/22') ? 'active' : ''); ?>">Azure</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('iOS Dev')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 23)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/23') ? 'active' : ''); ?>">iOS
                                        Development</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Blockchain')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 24)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/24') ? 'active' : ''); ?>">Blockchain</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Personal & Profession Dev')): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('view-track-fellows', 25)); ?>"
                                        class="nav-link <?php echo e(request()->is('tracks/fellows/list/25') ? 'active' : ''); ?>">Personal
                                        & Profession Development</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>

                
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
<?php /**PATH Z:\Bytewise\interactive\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>