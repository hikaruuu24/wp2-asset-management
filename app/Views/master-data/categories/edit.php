<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-6">
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
                <form action="../<?= $category['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Category Name" value="<?= $category['name'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <!-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> -->
                        <a href="<?=route_to('category_list')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>