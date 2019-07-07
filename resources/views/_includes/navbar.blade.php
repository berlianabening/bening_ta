<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Bening</a>
    <div class="navbar-nav">
      @if (Auth::user()->role_id == 1)
      <a class="nav-item nav-link" href="/user">User</a>
      <a class="nav-item nav-link" href="/satpam">Satpam</a>
      <a class="nav-item nav-link" href="/dokumen_absensi">Dokumen Absensi</a>
      <a class="nav-item nav-link" href="/penilaian">Dokumen Penilaian</a>
      @else
      <a class="nav-item nav-link" href="/usr/satpam">Absensi</a>
      <a class="nav-item nav-link" href="/usr/satpam">Data Penilaian</a>
      @endif

      <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </div>
</nav>