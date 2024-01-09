<div class="container-fluid mt-12">
    <div class="container">
        <h4>Edit Menu</h4>    
    </div>
    <form action="<?= site_url('beranda/edit_menu/' . $menu->id_makanan) ?>" method="POST">

        <div class="container card">
            <div class="card-body">
                <div class="">
                    <input type="hidden" name="id" value="<?= $menu->id_makanan ?>">
                    <span>Nama</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($menu->nama) ?>">
                    </div>  
                    <span>Harga</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="harga" value="<?= htmlspecialchars($menu->harga) ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                </div>
            </div>
        </div>
    </form>
</div>
