<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-danger">
                        <?php if (is_array(session()->getFlashdata('message'))): ?>
                            <?php foreach (session()->getFlashdata('message') as $error): ?>
                                <div><?= $error ?></div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?= session()->getFlashdata('message') ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <form action="../<?= $asset['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Name" value="<?= $asset['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select class="form-select" name="category" id="category">
                                    <option disabled selected>Select Category</option>
                                    <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= ($category['id'] == $asset['category_id'] ? 'selected' : '') ?>><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="type">Type</label>
                                <select class="form-select" name="type" id="type">
                                    <option disabled selected>Select Type</option>
                                    <?php foreach ($types as $type): ?>
                                    <option value="<?= $type['id'] ?>" <?= ($type['id'] == $asset['type_id'] ? 'selected' : '') ?>><?= $type['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="number" class="form-control" placeholder="Price" value="<?= $asset['price'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="purchase_date" class="form-label">Purchase Date</label>
                                <input type="date"  name="purchase_date" class="form-control" placeholder="Purchase Date" value="<?= $asset['purchase_date'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <div class="mb-3">
                                    <img src="<?= base_url('assets/images/pictures/' . $asset['image']) ?>" style="max-width: 100px;" alt="" class="img-fluid">
                                </div>
                                <input id="image" name="image" type="file" class="form-control" placeholder="Image" value="<?= $asset['image'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Description"><?= $asset['description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <!-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> -->
                        <a href="<?=route_to('asset_list')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>