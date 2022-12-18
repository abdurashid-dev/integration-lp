<li class="nav-item">
    <a href="{{route('admin.index')}}" class="nav-link @if (request()->is('admin')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.packages.index')}}" class="nav-link @if (request()->is('admin/packages*')) active @endif">
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
<li class="nav-item">
    <a href="{{route('admin.platforms.index')}}"
       class="nav-link @if (request()->is('admin/platforms*')) active @endif">
        <i class="nav-icon fas fa-parking"></i>
        <p>
            Platforms
        </p>
    </a>
</li>
