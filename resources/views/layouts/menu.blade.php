<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('/') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Kezdőlap</p>
    </a>
    @if(!Auth::user()->is_user())
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>Felhasználók</p>
    </a>
    @endif
</li>
