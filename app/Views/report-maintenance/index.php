<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="border-radius:15px 15px 15px 15px;">
                <h4 class="card-title">Filter Report</h4>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="month" name="month" class="form-control" id="" value="<?= $month ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group">
                                <button class="btn btn-primary float-right" type="submit"><i class="bx bx-send"></i>Submit</button>
                                <button type="submit" value="export" name="export" class="btn btn-danger float-right" ><i class="bx bxs-file-pdf" ></i>PDF</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="border-radius: 15px !important;">
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <table id="generalTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Completion Date</th>
                        <th>Asset</th>
                        <th>User Technical</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i= 1;?>
                        <?php foreach ($maintenances as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['name'] ?></td>
                                <td><span class="badge bg-success"><?= ucfirst($data['status']) ?></span></td>
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
                                <td><?= $data['asset_name'] ?></td>
                                <td><?= $data['user_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?= $this->endSection(); ?>



