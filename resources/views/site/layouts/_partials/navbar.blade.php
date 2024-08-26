<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('site.index') }}">New Home List</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('site.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('users.create') }}">Register</a></li>
            </ul>
        </div>
    </div>
</nav>