<?= $this->extend('layouts/app'); ?>
<?= $this->section('css'); ?>
    <style>
        .card-link-pointer {
           cursor: pointer;
       }
    </style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card mini-stats-wid card-link-pointer">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Asset</p>
                        <h4 class="mb-0"><?= $total_assets ?></h4>
                    </div>

                    <div class="flex-shrink-0 align-self-center">
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                            <span class="avatar-title">
                                <i class="bx bx-home-circle font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mini-stats-wid card-link-pointer">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">Maintenance</p>
                        <h4 class="mb-0"><?= $total_maintenances ?></h4>
                    </div>

                    <div class="flex-shrink-0 align-self-center ">
                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-task font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mini-stats-wid card-link-pointer" onclick="location.href='<?= route_to('user_list') ?>'">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-muted fw-medium">User</p>
                        <h4 class="mb-0"><?= $total_users ?></h4>
                    </div>

                    <div class="flex-shrink-0 align-self-center">
                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-user font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Maintenance not complete</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Asset</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Priority</th>
                                <th class="align-middle">Completion Date</th>
                                <th class="align-middle">User Technical</th>
                                <th class="align-middle">View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1; 
                                foreach ($maintenances as $maintenance) :
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $maintenance['name'] ?></td>
                                <td><?= $maintenance['asset_name'] ?></td>
                                <td>
                                    <?php if ($maintenance['status'] == 'complete'): ?>
                                       <span class="badge bg-success"><?= ucfirst($maintenance['status']) ?></span> 
                                    <?php elseif ($maintenance['status'] == 'draft'): ?>
                                       <span class="badge bg-warning"><?= ucfirst($maintenance['status']) ?></span> 
                                    <?php elseif ($maintenance['status'] == 'open'): ?>
                                       <span class="badge bg-primary"><?= ucfirst($maintenance['status']) ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($maintenance['priority'] == 'low'): ?>
                                       <span class="badge bg-primary"><?= ucfirst($maintenance['priority']) ?></span> 
                                    <?php elseif ($maintenance['priority'] == 'medium'): ?>
                                       <span class="badge bg-warning"><?= ucfirst($maintenance['priority']) ?></span> 
                                    <?php elseif ($maintenance['priority'] == 'high'): ?>
                                       <span class="badge bg-danger"><?= ucfirst($maintenance['priority']) ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td><?= $maintenance['completion_date'] ?></td>
                                <td><?= $maintenance['user_name'] ?></td>
                                <td>
                                    <a href="<?= route_to('maintenance_show', $maintenance['id']) ?>" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">View Details</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

