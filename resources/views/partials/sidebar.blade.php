<aside class="sidebar">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{route('admin.dashboard')}}" class="sidebar-logo">
            <img src="{{asset('adminassets/images/logo.png')}}" alt="site logo" class="light-logo">
            <img src="{{asset('adminassets/images/logo-light.png')}}" alt="site logo" class="dark-logo">
            <img src="{{asset('adminassets/images/logo-icon.png')}}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>User Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> View all users</a>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pending Approval</a>
                       
                    </li>
                    
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Listings Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> All Listing</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pending Approval</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Category and Brand</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Car categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Car Brand</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Content Management</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Static Pages</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Home Page Banners</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Featured Listings</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span> Reports</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Listing stats</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dashboard') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> User stats</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>