<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <form action="../<?= $maintenance['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Name" value="<?= $maintenance['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="asset">Asset</label>
                                <select class="form-select" name="asset" id="asset">
                                    <option disabled selected>Select Asset</option>
                                    <?php foreach ($assets as $asset): ?>
                                    <option value="<?= $asset['id'] ?>" <?= ($asset['id'] == $maintenance['asset_id'] ? 'selected' : '') ?>><?= $asset['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="priority">Priority</label>
                                <select class="form-select" name="priority" id="priority">
                                    <option disabled selected>Select Priority</option>
                                    <option value="low" <?= ($maintenance['priority'] == 'low' ? 'selected' : '') ?>>Low</option>
                                    <option value="medium" <?= ($maintenance['priority'] == 'medium' ? 'selected' : '') ?>>Medium</option>
                                    <option value="high" <?= ($maintenance['priority'] == 'high' ? 'selected' : '') ?>>High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="completion_date" class="form-label">Estimation Completion Date</label>
                                <input type="date"  name="completion_date" class="form-control" value="<?= date('Y-m-d', strtotime($maintenance['completion_date'])) ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select" name="status">
                                    <option disabled selected>Select Status</option>
                                    <option value="open" <?= ($maintenance['status'] == 'open' ? 'selected' : '') ?>>Open</option>
                                    <option value="draft" <?= ($maintenance['status'] == 'draft' ? 'selected' : '') ?>>Draft</option>
                                    <option value="complete" <?= ($maintenance['status'] == 'complete' ? 'selected' : '') ?>>Complete</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="user">User Technical</label>
                                <select class="form-select" name="user" id="user">
                                    <option disabled selected>Select User Technical</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= $user->id ?>" <?= ($user->id == $maintenance['user_id'] ? 'selected' : '') ?>><?= $user->username ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="task">Task Maintenance</label>
                                <textarea id="task" name="task" class="form-control" rows="4" placeholder="Task Maintenance"><?= $maintenance['task'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <!-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> -->
                        <a href="<?=route_to('maintenance_list')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>