<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6 d-flex justify-content-end mb-2">
                        <a href="<?=route_to('maintenance_create')?>" class="btn btn-md btn-info">
                            <i class="fa fa-plus"></i> 
                            Create record
                        </a>
                    </div>  
                    <hr>
                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-info">
                            <?= session()->getFlashdata('message') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <table id="generalTable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Date</th>
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
                                       <span class="badge bg-success"><?= $data['status'] ?></span> 
                                    <?php elseif ($data['status'] == 'draft'): ?>
                                       <span class="badge bg-warning"><?= $data['status'] ?></span> 
                                    <?php elseif ($data['status'] == 'open'): ?>
                                       <span class="badge bg-primary"><?= $data['status'] ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($data['priority'] == 'low'): ?>
                                       <span class="badge bg-primary"><?= $data['priority'] ?></span> 
                                    <?php elseif ($data['priority'] == 'medium'): ?>
                                       <span class="badge bg-warning"><?= $data['priority'] ?></span> 
                                    <?php elseif ($data['priority'] == 'high'): ?>
                                       <span class="badge bg-danger"><?= $data['priority'] ?></span> 
                                    <?php endif; ?>
                                </td>
                                <td><?= $data['timestamp'] ?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <a href="<?= route_to('maintenance_edit', $data['id']) ?>"
                                            class="btn btn-warning text-white">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="<?= route_to('maintenance_show', $data['id']) ?>"
                                            class="btn btn-primary text-white">
                                            <i class="far fa-eye"></i>
                                            Detail
                                        </a>
                                        <a href="#" onclick="modalDelete('Maintenance', '<?= $data['name'] ?>', 'maintenance/<?= $data['id'] ?>', '<?= route_to('maintenance_list') ?>')" class="btn btn-danger f-12">
                                            <i class="far fa-trash-alt"></i>
                                            Delete
                                        </a>

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



