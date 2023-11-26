<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark" style="border-radius:15px 15px 0px 0px;">
                <div class=" d-flex justify-content-end mb-2">
                    <?php if (user()->role_id == 1): ?>
                    <a href="<?=route_to('maintenance_create')?>" class="btn btn-md btn-info">
                        <i class="fa fa-plus"></i> 
                        Create record
                    </a>
                    <?php endif; ?>
                </div> 
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <table id="generalTable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Completion Date</th>
                        <th>User Technical</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;?>
                        <?php foreach ($maintenances as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['name'] ?></td>
                                <td>
                                    <?php if ($data['status'] == 'complete'): ?>
                                       <span class="badge bg-success"><?= ucfirst($data['status']) ?></span> 
                                    <?php elseif ($data['status'] == 'draft'): ?>
                                       <span class="badge bg-warning"><?= ucfirst($data['status']) ?></span> 
                                    <?php elseif ($data['status'] == 'open'): ?>
                                       <span class="badge bg-primary"><?= ucfirst($data['status']) ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($data['priority'] == 'low'): ?>
                                       <span class="badge bg-primary"><?= ucfirst($data['priority']) ?></span> 
                                    <?php elseif ($data['priority'] == 'medium'): ?>
                                       <span class="badge bg-warning"><?= ucfirst($data['priority']) ?></span> 
                                    <?php elseif ($data['priority'] == 'high'): ?>
                                       <span class="badge bg-danger"><?= ucfirst($data['priority']) ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td><?= $data['completion_date'] ?></td>
                                <td><?= $data['user_name'] ?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <?php if (user()->role_id == 1): ?>
                                            <a href="<?= route_to('maintenance_edit', $data['id']) ?>"
                                                class="btn btn-warning text-white">
                                                <i class="far fa-edit"></i>
                                                Edit
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= route_to('maintenance_show', $data['id']) ?>"
                                            class="btn btn-primary text-white">
                                            <i class="far fa-eye"></i>
                                            Detail
                                        </a>
                                        <?php if (user()->role_id == 1): ?>
                                            <a href="#" onclick="modalDelete('Maintenance', '<?= $data['name'] ?>', 'maintenance/<?= $data['id'] ?>', '<?= route_to('maintenance_list') ?>')" class="btn btn-danger f-12">
                                                <i class="far fa-trash-alt"></i>
                                                Delete
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?= $this->endSection(); ?>



