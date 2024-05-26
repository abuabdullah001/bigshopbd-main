<header class="main-navbar shadow-sm">
    <div class="top-navbar">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="my-auto d-none d-sm-none d-md-block d-lg-block me-2">
                    <a href="/">
                        <img src="{{ $settings->site_logo }}" class="brand-logo" alt="brand logo">
                    </a>
                </div>
                <div class="my-auto d-block border rounded search-area flex-grow-1">
                    <form role="search" action="{{ route('search.index') }}" method="GET">
                        @csrf

                        <div class="input-group search-content">
                            <input type="search" value="{{ request('search') }}" name="search" placeholder="Search your product ..." class="form-control shadow-none border-0" id="search"/>
                            <button class="btn bg-white search-btn shadow-none border-0" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center cart-widget" href="/checkout">
                                <i class="fa fa-shopping-cart"></i><sup>{{ $cartProduct ? count($cartProduct) : 0 }}</sup>
                                <span class="ms-1 d-none d-sm-none d-md-block">
                                    <small>
                                        Total price
                                    </small><br/>
                                    <strong>
                                        0.00
                                    </strong>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="/">
                <img src="{{ isset($settings->site_logo_white) ? $settings->site_logo_white : $settings->site_logo }}" class="brand-logo" alt="brand logo">
            </a>
            <button class="btn btn-sm border-0 d-md-block d-lg-none shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars nav-toggler-icon text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
                    @foreach ($categories as $category)    
                        <li class="nav-item">
                            <a class="nav-link text-nowrap overflow-x-scroll px-2" href="{{ route('category.product.show',$category->slug ) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>