<div class="container-fluid mt-12">
    <div class="container">
        <h4>Edit Barista</h4>    
    </div>
    <form action="<?= site_url('beranda/edit_barista/' . $barista->id) ?>" method="POST">

        <div class="container card">
            <div class="card-body">
                <div class="">
                    <input type="hidden" name="id" value="<?= $barista->id ?>">
                    <span>Username</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($barista->username) ?>">
                    </div>
                    <span>Email</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($barista->email) ?>">
                    </div>
                    <span>Role</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="role" value="<?= htmlspecialchars($barista->role) ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>
