<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-dark" style="border-radius: 15px 15px 0px 0px;">
                <h5 class="text-white">Kategori</h5>
            </div>
            <div class="card-body">
                <?php if (session('validation')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            <?php foreach (session('validation')->getErrors() as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('kategori')?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= old('nama_kategori') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark" style="border-radius: 0px 0px 15px 15px">
                    <button type="submit" class="btn btn-success ms-2">Simpan</button>
                    <a href="<?=base_url('kategori')?>" class="btn btn-danger">Batal</a>
                </div>
            </form>
            </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?= $this->endSection(); ?>



