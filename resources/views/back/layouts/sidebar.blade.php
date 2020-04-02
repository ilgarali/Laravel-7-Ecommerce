
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.post.index')}}">
                  <i class="mdi mdi-marker mr-4"></i>
                  <span class="menu-title">Products</span>
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{route('admin.categories.index')}}">
                <i class="mdi mdi-webhook mr-4"></i>
                  <span class="menu-title">Categories</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.contact')}}">
                  <i class="mdi mdi-facebook-messenger mr-4"></i>
                  <span class="menu-title">Messages</span>
                </a>
              </li>
            
          </ul>
        </nav>
        <!-- partial -->