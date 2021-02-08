<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link" hidden>
      <img src="../../images/cleaner.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cleaner</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../images/cleaner.png" class="img-circle elevation-2" alt="User Image" style="background-color: white;">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color:white;"><?php echo $username ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item" >
            <a href="http://localhost/cleaner/pages/home/?p=1" class="nav-link <?php if($_GET['p']=='1') echo 'active' ?>">
              <i class="nav-icon fa fa-fw fa-home"></i>
              <p>Dashboard</p>  
            </a>
          </li>
         <!-- <li class="sr_tab1 nav-item menu-open"> -->
         <li class="sr_tab1 nav-item <?php if($_GET['p']!='1') echo 'menu-open' ?>">
            <a class="sr_tab nav-link <?php if($_GET['p']!='1') echo 'active' ?>  ">
              <i class="nav-icon fas fa fa-fw fa-male "></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview sr_tree ">
              <li class="nav-item">
                <a class="nav-link <?php if($_GET['p']=='2') echo 'active' ?>" href="../jobs/?p=2">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($_GET['p']=='3') echo 'active' ?>" href="../sale/?p=3">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Planner</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($_GET['p']=='4') echo 'active' ?>" href="../products/?p=4">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Worksheets</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($_GET['p']=='5') echo 'active' ?>" href="../code/?p=5">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Debts</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>