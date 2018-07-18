<div class="row mb-3">
    <div class="d-none d-sm-block col">
        <div class="mt-3 ml-3">About Us</div>
    </div>
    <div class="col">
        <a href="{{ url('/') }}" class="text-dark">
            <div class="text-center d-none d-sm-block">
                <h2>Summer Story</h2>
            </div>
            <div class="d-none d-sm-block d-md-none d-block d-sm-none float-left mt-3">
                <h4>Summer Story</h4>
            </div>
        </a>
    </div>

    @guest
        <div class="col">
            <a href="{{ route('login') }}">
            <button  class="btn btn-outline-info mt-2 float-right mr-3 float-right" type="button">
                Sign In
            </button>
            </a>
            <a href="{{ route('register') }}">
            <button  class="btn btn-outline-info mt-2 float-right mr-3 float-right" type="button">
                Register
            </button>
            </a>
        </div>
    @else
    <div class="col text-right mt-1">
        <ul class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if (Auth::user()->avatar == '')
                    <img src="{{ url('/img/ava.png') }}" style="width: 30px;">
                @else

                @endif
                 <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="#">
                    {{ __('Profile') }}
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    {{ __('My Posts')}}
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            </div>
        </ul>
    </div>
    @endguest              
</div>