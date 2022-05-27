<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container mt-4">

        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- Form Edit User -->
                <form action="/admin/user/update" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="id">Id :</label>
                        </div>
                        <input type="text" name="id" id="id" value="<?= $user['id']; ?>" class="form-control" required readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="username">Username :</label>
                        </div>
                        <input type="text" name="username" id="username" value="<?= $user['username']; ?>" class="form-control" required autocomplete="off" placeholder="Masukan username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="pass">Password :</label>
                        </div>
                        <input type="text" name="password" id="pass" value="<?= $user['password']; ?>" class="form-control" required autocomplete="off" placeholder="Masukan password">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="name">Name :</label>
                        </div>
                        <input type="name" name="name" id="name" value="<?= $user['name']; ?>" class="form-control" required autocomplete="off" placeholder="Masukan nama public">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="role">Role :</label>
                        </div>
                        <select class="custom-select form-group" id="role" name="role">
                            <option value="<?= $user['role']; ?>"><?= $user['role']; ?></option>
                            <option value="member">Member</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="is_active">Aktivasi :</label>
                        </div>
                        <select class="custom-select form-group" id="is_active" name="aktivasi">
                            <option value="<?= $user['is_active']; ?>"><?= $user['is_active']; ?></option>
                            <option value="1">Aktive (1)</option>
                            <option value="0">Deactive (0)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary btn-icon-split mb-3">
                        <span class="icon text-white">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text ml-2"> Ubah Data</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</main>
<?= $this->endSection(); ?>