
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     
      
      <span class="brand-text font-weight-light " style="color:rgb(213, 108, 108)"><spa style="color:rgb(136, 197, 136)">AF</spa>SHOP</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @isset(Auth::guard('admin')->user()->photo)
          <img src="{{ asset(Auth::guard('admin')->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
              
          @endisset
        </div>
        <div class="info">
          @isset(Auth::guard('admin')->user()->name)
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
             
           
          @endisset
        </div>
      </div>


      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
               
            

               

              <li class="nav-item ">
               
                <a href="{{ route('admin.list') }}" class="nav-link  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin List</p>
                </a>
              </li>
              <li class="nav-item ">
          
             
                <a href="{{ route('admin.create') }}" class="nav-link  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin add</p>
                </a>
              </li>
            
                
                  </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Section
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
               
            

               

              <li class="nav-item ">
               
                <a href="{{ route('section.list') }}" class="nav-link  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section List</p>
                </a>
              </li>
              <li class="nav-item ">
          
             
                <a href="{{ route('section.create') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section add</p>
                </a>
              </li>
                        
             </ul>

          </li>
           <li class="nav-item">
            <a href="{{ url('/brand') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              Brand
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/category') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              Category
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/product') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              Product
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/slide_show') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              Slide Show
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
