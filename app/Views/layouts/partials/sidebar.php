<div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <?php if (user()->role_id == 1 || user()->role_id == 2): ?>
                            <li>
                                <a href="<?= route_to('dashboard') ?>" class="waves-effect">
                                    <i class="bx bxs-dashboard"></i>
                                    <span key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (user()->role_id == 1): ?>
                            <li>
                                <a href="<?= route_to('asset_list') ?>" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-asset">Asset</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (user()->role_id == 1 || user()->role_id == 2): ?>
                            <li>
                                <a href="<?= route_to('maintenance_list') ?>" class="waves-effect">
                                    <i class="bx bx-task"></i>
                                    <span key="t-maintenance">Maintenance</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (user()->role_id == 1 || user()->role_id == 2): ?>
                            <li>
                                <a href="<?= route_to('report_list') ?>" class="waves-effect">
                                    <i class="bx bxs-report"></i>
                                    <span key="t-maintenance">Report maintenance</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (user()->role_id == 1): ?>
                            <li>
                                <a href="<?= base_url('master-data') ?>" class="waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span key="t-master-data">Master data</span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if (user()->role_id == 1): ?>
                            <li>
                                <a href="<?= route_to('user_list') ?>" class="waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-user-management">User management</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>