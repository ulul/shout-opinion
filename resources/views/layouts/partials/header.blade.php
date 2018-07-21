<div class="row mb-3">
    <div class="d-none d-sm-block col">
        <div class="mt-2 ml-3">
            <a href="{{ url('/') }}"><img src="{{ url('/img/app/logo.png') }}" style="width: 70px;"></a>
        </div>
    </div>
    <div class="col mt-2">
        <a href="{{ url('/') }}" class="text-dark">
            <div class="text-center d-none d-sm-block">
                <h2>Shout Opinion</h2>
            </div>
            <div class="d-none d-sm-block d-md-none d-block d-sm-none float-left mt-3">
                <h4>Shout Opinion</h4>
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
                    {{ ucfirst(Auth::user()->name) }} <img src="{{ url('/img/app/ava.png') }}" style="width: 30px;" >
                @else
                    {{ ucfirst(Auth::user()->name) }} <img src="{{ Storage::url(Auth::user()->avatar) }}" style="width: 30px;" class="rounded-circle" >
                @endif
                 <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('user.profile', Auth::user()->username) }}">
                    {{ __('Profile') }}
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('post.create') }}">
                    {{ __('Create Opinion')}}
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