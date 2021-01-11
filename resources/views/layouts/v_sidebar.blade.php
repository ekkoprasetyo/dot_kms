<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ URL::asset('theme/adminlte305/dist/img/user2-160x160.jpg' ) }}" class="img-circle elevation-2" alt="KMS">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Session::get('users_fullname') }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ str_is('dashboard', Route::currentRouteName()) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ str_is('home', Route::currentRouteName()) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-house-user"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-header">DATA</li>
            <li class="nav-item has-treeview {{ str_is('knowledge-base*', Route::currentRouteName()) || str_is('knowledge-document*', Route::currentRouteName()) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ str_is('knowledge-base*', Route::currentRouteName()) || str_is('knowledge-document*', Route::currentRouteName()) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Knowledge
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('knowledge-base') }}" class="nav-link {{ str_is('knowledge-base*', Route::currentRouteName()) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Base</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('knowledge-document') }}" class="nav-link {{ str_is('knowledge-document*', Route::currentRouteName()) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Document</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('forum') }}" class="nav-link {{ str_is('forum*', Route::currentRouteName()) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Forum
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reward') }}" class="nav-link {{ str_is('reward*', Route::currentRouteName()) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Reward
                    </p>
                </a>
            </li>
            @include('layouts.v_admin_sidebar')
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->