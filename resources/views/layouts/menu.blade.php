<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('/') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Kezdőlap</p>
    </a>
    @if(Auth::user()->is_good() )
    <a href="{{ route('good.listusers') }}" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>Felhasználók</p>
    </a>
    @endif
</li>
