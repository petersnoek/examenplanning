<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout"
                        data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <div class="btn-group pull-right">
                    <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="si si-drop"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span
                                        class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span
                                        class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span
                                        class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span
                                        class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="h5 text-white" href="/home">
                    <img class="fa" src="/images/examenplanning_placeholder_16x16.png"> <span
                            class="h6 font-w600 sidebar-mini-hide">Examenplanning</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-full">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="/home"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Pages</span></li>
                    @if(Auth::user()->hasRole([1,2]))
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-plus"></i><span
                                        class="sidebar-mini-hide">CRUD</span></a>
                            <ul>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Kwalificatiedossier</a>
                                    <ul>
                                        <li>
                                            <a href="/kwalificatiedossiers">Read</a>
                                        </li>
                                        <li>
                                            <a href="/kwalificatiedossiers/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Schooljaren</a>
                                    <ul>
                                        <li>
                                            <a href="/schoolyears">Read</a>
                                        </li>
                                        <li>
                                            <a href="/schoolyears/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Perioden</a>
                                    <ul>
                                        <li>
                                            <a href="/periods">Read</a>
                                        </li>
                                        <li>
                                            <a href="/periods/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Slots</a>
                                    <ul>
                                        <li>
                                            <a href="/slots">Read</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Users</a>
                                    <ul>
                                        <li>
                                            <a href="/users">Read</a>
                                        </li>
                                        <li>
                                            <a href="/users/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Bedrijven</a>
                                    <ul>
                                        <li>
                                            <a href="/companies">Read</a>
                                        </li>
                                        <li>
                                            <a href="/companies/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Projects</a>
                                    <ul>
                                        <li>
                                            <a href="/projects">Read</a>
                                        </li>
                                        <li>
                                            <a href="/projects/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Examens</a>
                                    <ul>
                                        <li>
                                            <a href="/exams/show">Read</a>
                                        </li>
                                        <li>
                                            <a href="/exams/create">Create</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-refresh"></i><span
                                        class="sidebar-mini-hide">Revisions</span></a>
                            <ul>
                                <li>
                                    <a href="/revisions">Read</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-close"></i><span
                                        class="sidebar-mini-hide">Deletes</span></a>
                            <ul>
                                <li>
                                    <a href="/deletes/Kwalificatiedossier">Kwalificatiedossier</a>
                                </li>
                                <li>
                                    <a href="/deletes/Schoolyear">Schooljaren</a>
                                </li>
                                <li>
                                    <a href="/deletes/Period">Periodes</a>
                                </li>
                                <li>
                                    <a href="/deletes/Slot">Slots</a>
                                </li>
                                <li>
                                    <a href="/deletes/User">Users</a>
                                </li>
                                <li>
                                    <a href="/deletes/Company">Bedrijven</a>
                                </li>
                                <li>
                                    <a href="/deletes/Project">Projects</a>
                                </li>
                                <li>
                                    <a href="/deletes/Exam">Examens</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                        class="si si-calendar"></i><span
                                        class="sidebar-mini-hide">Plannen</span></a>
                            <ul>
                                <li>
                                    <a href="/slots/assignable/show">Slots inplannen</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="si si-eye"></i><span
                                    class="sidebar-mini-hide">Agenda inzien</span></a>
                        <ul>
                            <li>
                                <a href="/agenda">Persoonlijk</a>
                            </li>
                            @if(Auth::user()->hasRole([1,2]))
                                <li>
                                    <a href="/agenda/all">Alle</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>