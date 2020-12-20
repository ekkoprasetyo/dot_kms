<li class="nav-header">ADMIN</li>
<li class="nav-item has-treeview {{ str_is('users*', Route::currentRouteName()) || str_is('role*', Route::currentRouteName()) || str_is('permission*', Route::currentRouteName()) ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ str_is('users*', Route::currentRouteName()) || str_is('role*', Route::currentRouteName()) || str_is('permission*', Route::currentRouteName()) ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
            Users Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link {{ str_is('users*', Route::currentRouteName()) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('role') }}" class="nav-link {{ str_is('role*', Route::currentRouteName()) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('permission') }}" class="nav-link {{ str_is('permission*', Route::currentRouteName()) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
            </a>
        </li>
    </ul>
</li>
