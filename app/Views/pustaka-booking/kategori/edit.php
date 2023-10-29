<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-dark" style="border-radius: 15px 15px 0px 0px;">
                <h5 class="text-white">Kategori</h5>
            </div>
            <div class="card-body">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-12">
                        <form action="../<?= $kategori['id_kategori'] ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= $kategori['nama_kategori'] ?>">
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



