<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
          <!--<img src="{{asset('admin/img/logo/logo2.png')}}">-->
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Category</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category</h6>
            <a class="collapse-item" href="{{route('category.index')}}">View</a>
            <a class="collapse-item" href="{{route('category.create')}}">Create</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Subcategory</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subcategory</h6>
            <a class="collapse-item" href="{{route('subcategory.index')}}">View</a>
            <a class="collapse-item" href="{{route('subcategory.create')}}">Create</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Products</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products</h6>
            <a class="collapse-item" href="{{route('product.index')}}">View</a>
            <a class="collapse-item" href="{{route('product.create')}}">Create</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true"
          aria-controls="collapseTable1">
          <i class="fas fa-fw fa-table"></i>
          <span>Sliders</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sliders</h6>
            <a class="collapse-item" href="{{route('slider.index')}}">View</a>
            <a class="collapse-item" href="{{route('slider.create')}}">Create</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="true"
          aria-controls="collapseTable2">
          <i class="fas fa-fw fa-table"></i>
          <span>Users</span>
        </a>
        <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item" href="{{route('user.index')}}">View all Users</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable4" aria-expanded="true"
          aria-controls="collapseTable4">
          <i class="fas fa-fw fa-table"></i>
          <span>Orders</span>
        </a>
        <div id="collapseTable4" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders</h6>
            <a class="collapse-item" href="{{route('order.index')}}">View</a>
         
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
     
      <li class="nav-item">
       
         
       <a class="dropdown-item" href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>
        Logout
       
                                           </a>
       
                                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                               @csrf
                                           </form>
       
       
              
             </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>