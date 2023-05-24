<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
                <span>
                    Orthoc
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request()->Is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request()->Is('/about') ? 'active' : '' }}">
                        <a class="nav-link" href="/about"> About</a>
                    </li>
                    <li class="nav-item {{ Request()->Is('/departements') ? 'active' : '' }}">
                        <a class="nav-link" href="/departements">Departments</a>
                    </li>
                    <li class="nav-item {{ Request()->Is('/doctors') ? 'active' : '' }}">
                        <a class="nav-link" href="/doctors">Doctors</a>
                    </li>
                    <li class="nav-item {{ Request()->Is('/contact') ? 'active' : '' }}">
                        <a class="nav-link" href="contact">Contact Us</a>
                    </li> 
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                </ul>
                <!-- Example single danger button -->
                <div class="btn-group">
                @if (Route::has('login'))

                        @auth
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ url('images/about-img.jpg') }}" style="width: 40px; height:30px; border-radius:50%"
                                alt=""></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('envoyer') }}">Contacter le docteur</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
            
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"> 
                                                <i class="fa fa-logout"></i>
                                                <!-- (Optional) Use CSS or JS implementation -->
            
                                                <span>
                                                    {{ __('Log Out') }}</span> 
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth

                    @endif
              

                    
                    
                </div>
            </div>
        </nav>
    </div>
</header>
