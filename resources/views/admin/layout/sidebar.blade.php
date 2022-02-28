<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">

            <li class="nav-item @if(preg_match('/home/i',url()->current())) start active open @endif">
                <a href="{{url('admin/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
           @canany(['Show All Admins','Add admins','Edit admins' ,'Delete admins'])
                <li class="nav-item @if(preg_match('/admins/i',url()->current())) start active open @endif">
                    <a href="{{url(admin_admins_url())}}" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Admins Management</span>
                        <span class="selected"></span>
                    </a>
                </li>
            @endcan
            @canany(['Show All Roles','Edit roles' ,'Delete roles'])
                <li class="nav-item @if(preg_match('/roles/i',url()->current())) start active open @endif">
                    <a href="{{url(admin_roles_url())}}" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Roles Management</span>
                        <span class="selected"></span>
                    </a>
                </li>
            @elsecanany(['Add roles'])
                <li class="nav-item @if(preg_match('/roles/i',url()->current())) start active open @endif">
                    <a href="{{url(admin_roles_url().'/role-create')}}" class="nav-link nav-toggle">
                        <i class="fa fa-users"></i>
                        <span class="title">Create roles</span>
                        <span class="selected"></span>
                    </a>
                </li>
            @endcan
            @canany(['Show All users','View user'])
            <li class="nav-item @if(preg_match('/users/i',url()->current())) start active open @endif">
                            <a href="{{url(admin_users_url())}}" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Users</span>
                                <span class="selected"></span>
                            </a>

            </li>
            @endcan


{{--            @canany(['Show All users','View user'])--}}
            <li class="nav-item @if(preg_match('/test/i',url()->current())) start active open @endif">
                            <a href="{{url(admin_test_url())}}" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Test</span>
                                <span class="selected"></span>
                            </a>

            </li>
{{--            @endcan--}}

            @canany(['Show All settings','Add settings'])
                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="fa fa-globe"></i>
                        <span class="title"> Web Contents </span>
                        <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{url(admin_web_url().'/settings-edit')}}"> <i class="fa fa-cog"></i> Settings </a>
                        </li>
                        <li class="">
                            <a href="{{url(admin_web_url().'/contact-edit')}}"> <i class="fa fa-cog"></i> Contact us </a>
                        </li>

                    </ul>

                </li>
            @endcan
{{--            @canany(['Show All sectors','Edit sectors' ,'Delete sectors'])--}}

{{--                <li class="nav-item @if(preg_match('/sectors/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_sectors_url())}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title">Sectors</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--            @elsecanany(['Add sectors'])--}}
{{--                <li class="nav-item @if(preg_match('/sectors/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_sectors_url().'/sector-create')}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title">Create sectors</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--            @endcan--}}
{{--            @canany(['Show All messages','Edit messages' , 'Delete messages'])--}}
{{--                <li class="nav-item @if(preg_match('/managerMessages/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_managerMessages_url())}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fas fa-sticky-note"></i>--}}
{{--                        <span class="title">Manager Messages</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--            @elsecanany(['Add messages'])--}}
{{--                <li class="nav-item @if(preg_match('/managerMessages/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_managerMessages_url().'/managerMessage-create')}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fas fa-sticky-note"></i>--}}
{{--                        <span class="title">create manager messages</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--            @endcan--}}
{{--                @canany(['Show All teams','Edit teams' , 'Delete teams'])--}}
{{--                <li class="nav-item @if(preg_match('/teams/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_teams_url())}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fas fa-address-card"></i>--}}
{{--                        <span class="title">Teams</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--                @elsecanany(['Add teams'])--}}
{{--                <li class="nav-item @if(preg_match('/teams/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_teams_url().'/team-create')}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fas fa-address-card"></i>--}}
{{--                        <span class="title">Create teams</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--                @endcan--}}
{{--            @canany(['Show All partners','Edit partners' , 'Delete partners'])--}}
{{--                <li class="nav-item @if(preg_match('/partners/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_partners_url())}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-user-plus"></i>--}}
{{--                        <span class="title">Partners</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--                @elsecanany(['Add partners'])--}}
{{--                <li class="nav-item @if(preg_match('/partners/i',url()->current())) start active open @endif">--}}
{{--                    <a href="{{url(admin_partners_url().'/partner-create')}}" class="nav-link nav-toggle">--}}
{{--                        <i class="fa fa-user-plus"></i>--}}
{{--                        <span class="title">Create partners</span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}

{{--                </li>--}}
{{--                @endcan--}}

{{--                @canany(['Show All projects','Edit projects' , 'Delete projects'])--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link nav-toggle">--}}
{{--                        <i class="fab fa-accusoft"></i>--}}
{{--                        --}}{{--                    <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title"> Projects </span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        @canany(['Show All categories','Edit categories' , 'Delete categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url())}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Projects Categories </a>--}}
{{--                            </li>--}}
{{--                        @elsecanany(['Add categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url().'/category-create')}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Create projects Categories </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @canany(['Show All projects','Edit projects' , 'Delete projects'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_projects_url())}}"> <i class="fas fa-layer-group"></i>--}}
{{--                                    Projects </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @elsecanany(['Show All categories','Edit categories' , 'Delete categories'])--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link nav-toggle">--}}
{{--                        <i class="fab fa-accusoft"></i>--}}
{{--                        --}}{{--                    <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title"> Projects </span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        @canany(['Show All categories','Edit categories' , 'Delete categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url())}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Projects Categories </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @canany(['Show All projects','Edit projects' , 'Delete projects'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_projects_url())}}"> <i class="fas fa-layer-group"></i>--}}
{{--                                    Projects </a>--}}
{{--                            </li>--}}
{{--                            @elsecanany(['Add projects'])--}}
{{--                                <li class="">--}}
{{--                                    <a href="{{url(admin_projects_url().'/project-create')}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                        Create projects </a>--}}
{{--                                </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @elsecanany(['Add categories'])--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link nav-toggle">--}}
{{--                        <i class="fab fa-accusoft"></i>--}}
{{--                        <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title"> Projects </span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        @canany(['Add categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url().'/category-create')}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Create Categories </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @canany(['Show All projects','Edit projects' , 'Delete projects'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_projects_url())}}"> <i class="fas fa-layer-group"></i>--}}
{{--                                    Projects </a>--}}
{{--                            </li>--}}
{{--                          @elsecanany(['Add projects'])--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{url(admin_projects_url().'/project-create')}}"> <i class="fas fa-layer-group"></i>--}}
{{--                                            Create projects </a>--}}
{{--                                    </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @elsecanany(['Add projects'])--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link nav-toggle">--}}
{{--                        <i class="fab fa-accusoft"></i>--}}
{{--                        <i class="fa fa-caret-up"></i>--}}
{{--                        <span class="title"> Projects </span>--}}
{{--                        <span class="selected"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu">--}}
{{--                        @canany(['Show All categories','Edit categories' , 'Delete categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url())}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Projects Categories </a>--}}
{{--                            </li>--}}
{{--                        @elsecanany(['Add categories'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_categories_url().'/category-create')}}"> <i class="fa fa-caret-up"></i>--}}
{{--                                    Create Categories </a>--}}
{{--                            </li>--}}

{{--                        @endcan--}}
{{--                        @canany(['Add projects'])--}}
{{--                            <li class="">--}}
{{--                                <a href="{{url(admin_projects_url().'/project-create')}}"> <i class="fas fa-layer-group"></i>--}}
{{--                                   Create projects </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcan--}}

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
