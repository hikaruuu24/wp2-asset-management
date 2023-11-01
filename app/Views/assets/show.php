<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card" style="border-radius:15px 15px 15px 15px;">
            <div class="card-header bg-white" >
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Image</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Detail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Action</button>
                </li>
                </ul>
                <hr>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <img src=<?= base_url('assets/images/pictures/'.$asset['image']) ?> class="img-fluid" style="max-width:100%;" alt="">
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Name</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= $asset['name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Type</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= $asset['type_name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Category</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= $asset['category_name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Price</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= 'Rp '. number_format($asset['price'],2,',','.') ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Purchase Date</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= date('d F Y', strtotime($asset['purchase_date'])) ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p class="fw-bold">Description</p>
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <p>:</p>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <p><?= ($asset['description'] == null) ? 'No description' : $asset['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="action-button text-center">
                                <a href="<?= route_to('asset_edit', $asset['id']) ?>"
                                    class="btn btn-warning text-white">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <a href="#" onclick="modalDelete('Asset', '<?= $asset['name'] ?>', '<?= route_to('asset_delete', $asset['id']) ?>', '<?= route_to('asset_list') ?>')" class="btn btn-danger f-12">
                                    <i class="far fa-trash-alt"></i>
                                    Delete
                                </a>
                            </div>    
                        <img src=<?= base_url('assets/images/confused_man.jpg') ?> class="img-fluid" style="max-width:100%;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Name</P>
                        <h3><?= $asset['name'] ?></h3>
                    </div>
                </div>
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Purchase Date</P>
                        <h3><?= date('d F Y', strtotime($asset['purchase_date'])) ?></h3>
                    </div>
                </div>
                <div class="card" style="border-radius:15px 15px 15px 15px;">
                    <div class="card-body text-center">
                        <P>Category</P>
                        <h3><?= $asset['category_name'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Nav tabs -->
<?= $this->endSection(); ?>



