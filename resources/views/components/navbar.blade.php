    <nav class="navbar navbar-expand bg-dark">
        <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link text-light">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link text-light">Book</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ url('/borrow') }}" class="nav-link text-light">Borrow</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Others
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('authors.index') }}">Author</a></li>
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Category</a></li>
                                <li><a class="dropdown-item" href="{{ route('publishers.index') }}">Publisher</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

        </div>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>