<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center">
                Admin Area
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <?= session()->getFlashdata('pesan'); ?>
                <?php endif; ?>

                <div class="row mb-3">
                    <div class="col">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-setting-tab" data-toggle="tab" href="#nav-setting" role="tab" aria-controls="nav-setting" aria-selected="false">Setting</a>
                                <a class="nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">User</a>
                                <a class="nav-link" id="nav-config-tab" data-toggle="tab" href="#nav-config" role="tab" aria-controls="nav-config" aria-selected="true">Config</a>
                                <a class="nav-link" id="nav-token-tab" data-toggle="tab" href="#nav-token" role="tab" aria-controls="nav-token" aria-selected="false">Token</a>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
                        <form action="/admin/setting/save" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="aktivasi">Aktivasi User :</label>
                                <select class="custom-select" id="aktivasi" name="aktivasi">
                                    <option selected><?= $aktivasi; ?></option>
                                    <option value="<?= ($aktivasi == 0 ? 1 : 0); ?>"><?= ($aktivasi == 0 ? 1 : 0); ?></option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-icon-split mt-1 btn-sm">
                                <span class="icon">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text ml-2"> Save</span>
                            </button>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                        <div class="table-responsive">
                            <table class="table table-stripped table-bordered text-nowrap" id="dataTable" cellspacing="0">
                                <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Dibuat</th>
                                        <th>Aktivasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $u) : ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td><?= $u["username"]; ?></td>
                                            <td><?= $u["name"]; ?></td>
                                            <td><?= $u["role"]; ?></td>
                                            <td><?= $u["created_at"]; ?></td>
                                            <td><?= $u["is_active"]; ?></td>
                                            <td>
                                                <form action="/admin/user/edit" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                                </form>
                                                <form action="/admin/user/delete" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <thead class="bg-primary text-white text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Dibuat</th>
                                        <th>Aktivasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
                        <form action="/admin/save" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="client_id">Client ID :</label>
                                <input type="text" name="client_id" class="form-control" id="client_id" value="<?= $client_id; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="client_secret">Client Secret :</label>
                                <input type="text" name="client_secret" class="form-control" id="client_secret" value="<?= $client_secret; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="client_secret">Code Challenge/Verify :</label>
                                <input type="text" name="code_challenge" class="form-control" id="client_secret" value="<?= $code_challenge; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="token">Access Token :</label>
                                <input type="text" name="access_token" class="form-control" id="token" value="<?= $access_token; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="token">Refresh Token :</label>
                                <input type="text" name="refresh_token" class="form-control" id="token" value="<?= $refresh_token; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="token">Created Token :</label>
                                <input type="text" class="form-control" id="token" value="<?= $created_token; ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="token">Expired Token :</label>
                                <input type="text" name="expired_token" class="form-control" id="token" value="<?= $expired_token; ?>" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-icon-split mt-1 btn-sm">
                                <span class="icon">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text ml-2"> Save</span>
                            </button>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="nav-token" role="tabpanel" aria-labelledby="nav-token-tab">
                        <form action="/admin/token" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="token">Update token :</label>
                                <input type="text" name="get_token" class="form-control" id="token" value="Token" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-icon-split mt-1 btn-sm">
                                <span class="icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                                <span class="text ml-2"> Update</span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>