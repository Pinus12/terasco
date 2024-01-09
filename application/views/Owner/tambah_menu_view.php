<div class="container-fluid mt-12">
    <div class="container">
        <h4>Tambah Menu</h4>    
    </div>
    <form action="<?= site_url('beranda/insert_menu')?>" method="POST">

        <div class="container card ">
            <div class="card-body">
                <div class="">
                    <span>Nama</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama">
                    </div>
                    <span>Harga</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="harga">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Tambah</button>

                </div>
            </div>
        </div>
    </form> 
</div>
</div>
