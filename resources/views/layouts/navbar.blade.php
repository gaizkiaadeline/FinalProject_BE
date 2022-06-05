<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="uil uil-building me-2"></i>PT Musang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/home') }}"><i class="uil uil-home me-1">
                        </i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="uil uil-notebooks me-1">
                        </i>Blogs</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}"><i class="uil uil-user-plus me-1">
                            </i>Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}"><i class="uil uil-user me-1"></i>
                            </i>Login</a>
                    </li>
                @else
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/categories') }}"><i class="uil uil-apps me-1"></i>
                                Manage Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/blogs') }}"><i
                                    class="uil uil-chat-bubble-user me-1"></i>
                                Manage Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/blogs') }}"><i
                                    class="uil uil-chat-bubble-user me-1"></i><i class="uil uil-shopping-cart-alt"></i>
                                Cart</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->email }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault();
                                                                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
