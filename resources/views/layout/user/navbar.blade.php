<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Techie</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @auth
                    <li><a href="{{url('/profile')}}" class="d-xl-none {{ Request::is('profile') ? 'active' : '' }}">Your Profile</a></li>
                    <li><a href="{{url('/setting')}}" class="d-xl-none {{ Request::is('setting') ? 'active' : '' }}">Setting</a></li>
                    <li><a href="{{url('/blog')}}" class="{{ Request::is('blog') ? 'active' : '' }}">Blogs</a></li>
                    <li><a href="{{url('/about')}}" class="{{ Request::is('about') ? 'active' : '' }}">About us</a></li>
                    <li class="dropdown"><a href="{{url('/')}}"><span>Tech Category</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#" id="programming-route">Programming</a></li>
                            <li><a href="#" id="ai-route">AI</a></li>
                        </ul>
                    </li>
                    <li class="px-2 d-xl-none">
                        <form action="{{url('/logout')}}" method="post">
                            @csrf
                            <button class="w-100 btn btn-danger fw-bolder" type="submit">Log out</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{url('/blog')}}" class="{{ Request::is('blog') ? 'active' : '' }}">Blogs</a></li>
                    <li><a href="{{url('/about')}}" class="{{ Request::is('about') ? 'active' : '' }}">About us</a></li>
                    <li class="dropdown"><a href="{{url('/')}}"><span>Tech Category</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a id="programming-route" href="#">Programming</a></li>
                            <li><a id="ai-route" href="#">AI</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @auth
            <div class="dropdown-center d-none d-xl-block" style="margin-left: 30px">
                <button class="btn btn-outline-light dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2"></i>{{Auth::user()->username}}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{url('/profile')}}">Your Profile</a></li>
                    <li><a class="dropdown-item" href="{{url('/setting')}}">Setting</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{url('/logout')}}" method="post">
                            @csrf
                            <button class="dropdown-item text-danger fw-bolder" type="submit">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
        <a class="btn-getstarted" href="{{url('/login')}}"><i class="fa-solid fa-user"></i> Login</a>
        @endauth
    </div>

    <script>
        let routeProgramming = document.getElementById('programming-route')
        let routeAI = document.getElementById('ai-route')

            routeProgramming.addEventListener('click', function(){
                window.location.href = '/blog?search=PROGRAMMING';
            })
        routeAI.addEventListener('click', function(){
                window.location.href = '/blog?search=AI';
            })

    </script>
</header>
