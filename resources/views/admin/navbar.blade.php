<div class="container-scroller">
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
<!-- partial -->
<div class="">
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    
  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('/users')}}">
          <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/foodmenu')}}">
          <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
          <span class="menu-title">FoodMenu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/viewchef')}}">
          <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
          <span class="menu-title">Chefs</span>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{url('/viewreservation')}}">
            <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
            <span class="menu-title">Reservations</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/orders')}}">
            <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
            <span class="menu-title">Orders</span>
          </a>
        </li>
     
    </ul>
  </nav>
  <!-- partial -->
 
</div>
<!-- page-body-wrapper ends -->
</div>