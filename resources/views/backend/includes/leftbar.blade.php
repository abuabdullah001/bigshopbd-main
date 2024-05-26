
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-home-3-line"></i><span class="badge rounded-pill bg-success float-end">4</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-grid-fill"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('product.index') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.create') }}" class="waves-effect">
                                <i class="ri-file-add-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Create Product</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-line"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ url('/categories') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/categories/create') }}" class="waves-effect">
                                <i class="ri-file-add-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Add category</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-building-line"></i>
                        <span>Brand</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{url('/brands')}}" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>brands</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/brands/create')}}" class="waves-effect">
                                <i class="ri-file-add-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Add brand</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Orders</li>

                <li>
                    <a href="{{ route('order.manage') }}" class="waves-effect">
                        <i class="ri-takeaway-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Manage Order</span>
                    </a>
                </li>

                <li class="menu-title">General</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-building-line"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="{{ route('sliders') }}" class="waves-effect">
                                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Sliders</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ route('slider.create') }}" class="waves-effect">
                                <i class="ri-file-add-fill"></i><span class="badge rounded-pill bg-success float-end"></span>
                                <span>Create</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('site.settings') }}" class="waves-effect">
                        <i class="ri-settings-3-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Settings</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->