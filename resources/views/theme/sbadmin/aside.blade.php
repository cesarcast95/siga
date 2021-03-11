    <!-- Sidebar -->
    <ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-text mx-3">SIGA | RIOPAILA </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de Control</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        {{-- Heading --}}
        @include("theme.$theme.header")
  
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Control de Cupos</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Procedimientos:</h6>
              <a class="collapse-item" href="{{route('seleccion')}}">Cupos</a>
              <a class="collapse-item" href="{{route('entrevista')}}">Entrevistas</a>
            </div>
          </div>
        </li>
          
  
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-pen"></i>
      <span>Gestión de Contratos</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Procedimientos:</h6>
        <a class="collapse-item" href="{{route('seleccion')}}">Contratos</a>
        <a class="collapse-item" href="{{route('entrevista')}}">Suspensiones</a>
      </div>
    </div>
  </li>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->