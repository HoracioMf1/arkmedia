
<li class="menu-header">Dashboard</li>
<li class="side-menus {{ Request::is('*') ? 'inactive' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Inicio</span>
    </a>
</li>
@can('ver-rol')
<li class="side-menus {{ Request::is('*') ? 'inactive' : '' }}">
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
</li>
@endcan
@can('ver-rol')
<li class="side-menus {{ Request::is('*') ? 'inactive' : '' }}">
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>roles</span>
    </a>
</li>
@endcan
@can('ver-rol')
<li class="side-menus {{ Request::is('*') ? 'inactive' : '' }}">
    <a class="nav-link" href="/actividades">
         <i class="fas fa-list"></i></i><span>Actividades</span>
    </a>
</li>
@endcan
<li class="side-menus {{ Request::is('*') ? 'inactive' : '' }}">
    <a class="nav-link" href="/reportes">
        <i class=" fas fa-file-alt"></i><span>Reportes</span>
    </a>
</li>


