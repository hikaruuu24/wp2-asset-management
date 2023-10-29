<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6 d-flex justify-content-end my-2">
                        <a href="<?=base_url('kategori/create')?>" class="btn btn-md btn-info">
                            <i class="fa fa-plus"></i> 
                            Tambah data
                        </a>
                    </div>  
                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-info">
                            <?= session()->getFlashdata('message') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <table id="kategoriTable" class="table table-bordered dt-responsive table-striped nowrap w-100">
                    <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;?>
                        <?php foreach ($kategori as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['nama_kategori'] ?></td>
                                <td><?= $data['timestamp'] ?></td>
                                <td>
                                <div class="btn-group-sm">
                                        <a href="<?= base_url('kategori/edit/'. $data['id_kategori'])?>"
                                            class="btn btn-warning text-white">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>

                                        <a href="#" onclick="modalDelete('Kategori', '<?= $data['nama_kategori'] ?>', 'kategori/<?= $data['id_kategori'] ?>', 'kategori')" class="btn btn-danger f-12">
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



