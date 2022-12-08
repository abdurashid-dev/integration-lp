<li class="nav-item">
    <a href="{{route('admin.index')}}" class="nav-link @if (request()->is('admin')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.packagies.index')}}" class="nav-link @if (request()->is('admin/packagies*')) active @endif">
        <i class="nav-icon fas fa-box-open"></i>
        <p>
            Packagies
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.technologies.index')}}"
       class="nav-link @if (request()->is('admin/technologies*')) active @endif">
        <i class="nav-icon fas fa-terminal"></i>
        <p>
            Technologies
        </p>
    </a>
</li>
