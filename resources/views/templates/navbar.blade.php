<nav class="navbar navbar-expand-lg navbar-light bg-white p-4 sticky-top shadow">
  <div class="container-fluid">
    <a href="#" class="navbar-brand h1 mb-0">Master Tech</a>
    <!-- Navbar Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navSite">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Conteúdo da navbar -->
    <div class="collapse navbar-collapse" id="navSite">
      <!-- conteúdos à esquerda -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Início</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Fornecedor</a>
          <div class="dropdown-menu">
            <a href="{{ route('supplier.index') }}" class="dropdown-item">Fornecedores</a>
            <a href="{{ route('supplier.create') }}" class="dropdown-item">Novo fornecedor</a>
          </div>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrar</a></li>
        @else
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu">
              <a id="logout-btn" href="#" class="dropdown-item">Logout</a>
            </div>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
          </form>
          <script>
            document.querySelector('#logout-btn').addEventListener('click', logout)
            function logout(){
              event.preventDefault()
              document.querySelector('#logout-form').submit()
            }
          </script>
        @endguest
      </ul>
    </div>
  </div>
</nav>