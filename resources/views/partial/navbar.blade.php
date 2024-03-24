<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
        </div>

        @auth
        
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back! {{ auth()->user()->username }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="fa-solid fa-power-off" style="color: #404040;"></i> Log Out</button>
              </form>
              </li>
          </ul>
        </li>
        @else
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a href="/login" class="nav-link "><i class="fa-solid fa-right-to-bracket fa-lg" style="color: #404040;"></i> Login</a>
          </li>
      </ul>
        @endauth
      </div>
    </div>
  </nav>