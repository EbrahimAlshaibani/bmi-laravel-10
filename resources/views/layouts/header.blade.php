<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('students.index') }}">BIM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href=" {{ route('home') }} ">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('students') ? 'active' : '' }}" href=" {{ route('students.index') }} ">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href=" {{ route('products.index') }} ">Products</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>