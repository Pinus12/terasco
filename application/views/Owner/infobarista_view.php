<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contoh CodeIgniter</title>
</head>

<body>
    <?php if (!empty($data_barista)) : ?>
        <div class="container-fluid mt-12">

            <table class="  table-info table  table-striped  table-hover table-rounded ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_barista->result() as $barista) : ?>
                        <tr>
                            <td scope="row"><?php echo $i;
                                            $i++ ?></td>
                            <td class=""><?php echo $barista->username; ?></td>
                            <td><?php echo $barista->email; ?></td>
                            <td><?php echo $barista->role; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= site_url('Beranda/update_menu/' . $barista->id) ?>" class="btn btn-success">
                                        <i class="fas fa-user-pen"></i> Update
                                    </a>
                                    <a href="<?= site_url('Beranda/hapus_menu/' . $barista->id) ?>" class="btn btn-danger">
                                        <i class="fas fa-user-xmark"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else : ?>
            <p>Tidak ada data barista.</p>
        <?php endif; ?>
        <a href="<?= base_url('Beranda/tambah_barista') ?>" class="btn btn-success">Tambah</a>
        </div>
</body>

</html>