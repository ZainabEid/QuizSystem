<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <p class="brand-link">

    <span class="brand-text font-weight-light">Quiz System</span>
  </p>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <?php if( auth_check()): ?>
        <a href="<?= site_url('dashboard/profile')?>" class="d-block"><?= ucfirst(auth_user()['name']) ?> Profile</a>
        <?php  endif; ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- admins  -->
        <li class="nav-header">Admins</li>

        <!-- all admins  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/users/admins')?>" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              All Admins
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

        <!-- Add User  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/users/admins/create')?>" class="nav-link">
            <i class="nav-icon fa fa-user-plus"></i>
            <p>
              Add Admin
            </p>
          </a>
        </li>
        

        <!-- tests  -->
        <li class="nav-header">Tests</li>

        <!-- all tests  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/tests')?>" class="nav-link">
            <i class="nav-icon far fa-edit"></i>
            <p>
              All Tests
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

        <!-- add test  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/tests/create')?>" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Add Test
            </p>
          </a>
        </li>

        <!-- users  -->
        <li class="nav-header">Users</li>

        <!-- all users  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/users')?>" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              All Users
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>

        <!-- Add User  -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard/users/create')?>" class="nav-link">
            <i class="nav-icon fa fa-user-plus"></i>
            <p>
              Add User
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>