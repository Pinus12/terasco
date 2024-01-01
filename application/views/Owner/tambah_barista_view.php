<div class="container-fluid mt-12">
    <div class="container">
        <h4>Tambah Barista</h4>    
    </div>
    <form action="<?= site_url('beranda/insert_barista')?>" method="POST">

        <div class="container card ">
            <div class="card-body">
                <div class="">
                    <span>Username</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="username">
                    </div>
                    <span>Email</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
                    </div>
                    <span>Role</span>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="role" value="Barista" disabled>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Tambah</button>

                </div>
            </div>
        </div>
    </form> 
</div>
</div>
