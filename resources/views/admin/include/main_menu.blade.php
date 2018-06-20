<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item">
                <a href="#"><i class="icon-cart"></i>
                    <span class="menu-title">Pages Info</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::path() == 'admin-category' ? 'active' : '' }}"><a href="{{url('/admin-category')}}" class="menu-item">Category Page</a></li>
                    <li class="{{ Request::path() == 'admin-subcategory' ? 'active' : '' }}"><a href="{{url('/admin-subcategory')}}" class="menu-item">Sub Category Page</a></li>
                </ul>
            </li>
            
            
          
            <li class="{{ Request::path() == 'admin-about' ? 'active' : '' }}"><a href="{{url('/admin-about')}}"><i class="icon-user-plus"></i><span class="menu-title">About Us</span></a></li>
            <li class="{{ Request::path() == 'admin-slider' ? 'active' : '' }}"><a href="{{url('/admin-slider')}}"><i class="icon-user-plus"></i><span class="menu-title">Slider</span></a></li>
            <li class="{{ Request::path() == 'admin-product' ? 'active' : '' }}"><a href="{{url('/admin-product')}}"><i class="icon-user-plus"></i><span class="menu-title">Product</span></a></li>
            <li class=" nav-item">
                <a href="#"><i class="icon-cart"></i>
                    <span class="menu-title">Site Setting</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::path() == 'admin-sitesetting' ? 'active' : '' }}"><a href="{{url('/admin-sitesetting')}}" class="menu-item">Site Info</a></li>
                    <li class="{{ Request::path() == 'admin-seosetting' ? 'active' : '' }}"><a href="{{url('/admin-seosetting')}}" class="menu-item">SEO Setting</a></li>
                </ul>
            </li>
            <li class="{{ Request::path() == 'admin/contact/request' ? 'active' : '' }}"><a href="{{url('/admin/contact/request')}}"><i class="icon-user-plus"></i><span class="menu-title">Contact Request List</span></a></li>
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <div class="main-menu-footer footer-close">
        <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>
        <div class="content">
            <div class="actions">
                <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Settings"><span aria-hidden="true" class="icon-cog3"></span></a>
                <a href="{{url('admin/unlock')}}" data-placement="top" data-toggle="tooltip" data-original-title="Lock"><span aria-hidden="true" class="icon-lock4"></span></a>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
                    <span aria-hidden="true" class="icon-power3"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- main menu footer-->
</div>