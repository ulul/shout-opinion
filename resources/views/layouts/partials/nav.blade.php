<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
    <a class="navbar-brand" href="{{ url('/') }}">
        Home
    </a>
    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon">
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="text-white"> About Us </div>
                </a>
            </li>
            
            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
                    Categories 
                </a>
                <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('post.index') }}">
                        All Categories
                    </a>
                   @forelse ($categories AS $category)
                        <a class="dropdown-item" href="{{ route('opinion.category', $category->category_slug) }}">
                            {{ $category->category }}
                        </a>
                   @empty

                   @endforelse
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="text-white"> Privacy Policy </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div class="text-white"> Disclaimer </div>
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input aria-label="Search" class="form-control mr-sm-2" placeholder="Search" type="search">
                <button class="btn btn-outline-default my-2 my-sm-0" type="submit">
                    Search
                </button>
            </input>
        </form>
    </div>
</nav>