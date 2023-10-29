<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= route_to('user_store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="<?= old('email') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="<?= old('username') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email">Role</label>
                                <select class="form-select" name="role" id="role">
                                    <option disabled selected>Select Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" required name="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="userpassword" class="form-label">Confirm Password</label>
                                <input type="password" required name="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <!-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> -->
                        <a href="<?=route_to('user_list')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>