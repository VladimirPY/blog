    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Blog Edinorog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('services') }}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
            </li>
            
          @guest
            <li class="nav-item">
              <a  class="nav-link" href="{{ route('login') }}">
                LogIn <img style = "max-height:30px;max-width:30px" src = 'images/in.svg'>
              </a>
            </li>
          @else
            @if(Auth::user()->type == 1)
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin') }}">Administrate</a>
              </li>
            @endif
            <li class="nav-item">
              <a  class="nav-link" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();" 
                href="{{ route('logout') }}">
                <b>{{ Auth::user()->name }}</b> 
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          @endguest
            
          </ul>
        </div>
      </div>
    </nav>