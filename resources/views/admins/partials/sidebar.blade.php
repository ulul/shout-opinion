
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div id="toggle-sidebar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="sidebar-brand">
                    <a href="#">Administrator</a>
                </div>
               
              
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        
                        <li class="header-menu">
                            <span>Master</span>
                        </li>
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage.user') }}">
                                <i class="fa fa-user"></i>
                                <span>Manage User</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage.opinion') }}">
                                <i class="fa fa-folder"></i>
                                <span>Manage Opinion</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                
                <a href=" {{ route('admin.logout') }}">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        
    <!-- page-content" -->
  