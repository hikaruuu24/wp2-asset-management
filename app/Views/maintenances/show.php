<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card" style="border-radius:15px 15px 15px 15px;">
            <div class="card-header bg-white" >
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Maintenance Detail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tasks</button>
                </li>
                <?php if (user()->role_id == 1): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Action</button>
                </li>
                <?php endif; ?>
                </ul>
                <hr>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Name</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= $maintenance['name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Asset</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= $maintenance['asset_name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Asset Image</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Click Image</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Priority</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= ucfirst($maintenance['priority']) ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Status</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= ucfirst($maintenance['status']) ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">Completion date</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= date('d F Y', strtotime($maintenance['completion_date'])) ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-4">
                                    <p class="fw-bold">User Technical</p>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <p><?= $maintenance['user_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Task list</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap align-middle mb-0">
                                                <tbody>
                                                    <?php 
                                                     $i = 1;
                                                     foreach ($maintenance['maintenance_tasks'] as $task): ?>
                                                    <tr>
                                                        <td style="width: 40px;">
                                                            <?= $i++. '.' ?>
                                                        </td>
                                                        <td>
                                                            <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark"><?= $task['task'] ?></a></h5>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="action-button text-center">
                                <a href="<?= route_to('maintenance_edit', $maintenance['id']) ?>"
                                    class="btn btn-warning text-white">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <a href="#" onclick="modalDelete('Maintenance', '<?= $maintenance['name'] ?>', '<?= route_to('maintenance_delete', $maintenance['id']) ?>', '<?= route_to('maintenance_list') ?>')" class="btn btn-danger f-12">
                                    <i class="far fa-trash-alt"></i>
                                    Delete
                                </a>
                            </div>    
                        <img src=<?= base_url('assets/images/confused_man.jpg') ?> class="img-fluid" style="max-width:100%;" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php if ($maintenance['user_name'] == user()->username || user()->role_id == 1): ?>
            <?php if ($maintenance['document'] == null): ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upload Document</h4>
                </div>
                <div class="card-body">
                    <form action="<?= route_to('maintenance_document', $maintenance['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="document" class="form-control" require>
                                <small>*To complete the task you need to upload a document</small>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php else: ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Document</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('assets/docs/'.$maintenance['document']) ?>"  target="_blank"><?= $maintenance['document'] ?></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Status</P>
                        <h3><?= ucfirst($maintenance['status']) ?></h3>
                    </div>
                </div>
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Maintenance</P>
                        <h3><?= $maintenance['name'] ?></h3>
                    </div>
                </div>
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Asset</P>
                        <h3><?= $maintenance['asset_name'] ?></h3>
                    </div>
                </div>
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>User Technical</P>
                        <h3><?= $maintenance['user_name'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>



<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Image of a <?= $maintenance['asset_name'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src=<?= base_url('assets/images/pictures/'.$maintenance['asset_image']) ?> class="img-fluid" style="max-width:100%;" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div> <!-- end preview-->
<!-- Nav tabs -->
<?= $this->endSection(); ?>



