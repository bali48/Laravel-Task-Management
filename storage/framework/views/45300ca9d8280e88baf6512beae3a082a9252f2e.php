    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="<?php echo e(auth()->user()->image_path); ?>"
                         alt="User picture">
                </div>
                <div class="user-info">
          <span class="user-name">
              <?php echo e(auth()->user()->name); ?>

          </span>
                    <span class="user-role"><?php echo e(auth()->user()->role->name); ?></span>

                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/dashboard')); ?>">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Users</span>

                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo e(route('userlist')); ?>">UsersList

                                    </a>
                                </li>
                                <li>
                                    <a href="#">NewUser</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="far fa fa-tasks"></i>
                            <span>Tasks</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo e(route('tasklist')); ?>">TaskList</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('addtask')); ?>">New Task</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
<?php /**PATH /var/www/html/L-TaskManagement/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>