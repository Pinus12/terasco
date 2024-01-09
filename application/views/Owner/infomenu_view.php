   <div class="container-fluid mt-4">
       <div class="container">
           <button id="show_makanan" onclick="showMakanan()" class="btn btn-success mt-11">Makanan</button>
           <button id="show_minuman" onclick="showMinuman()" class="btn btn-success mt-11">Minuman</button>
           <button id="show_cemilan" onclick="showCemilan()" class="btn btn-success mt-11">Cemilan</button>
       </div>

       <?php if (empty($data_menu->result())) : ?>
           <p>Tidak ada data menu.</p>
       <?php else : ?>
           <div id="TampilanMakanan" style="display: block;">
               <div class="container   overflow-scroll" style="max-height: 400px;">
                   <table class="table table-info table-striped table-hover table-rounded">
                       <thead>
                           <tr>
                               <th scope="col">No</th>
                               <th scope="col">Nama</th>
                               <th scope="col">Harga</th>
                               <th scope="col">Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($data_menu->result() as $menu_item) : ?>
                               <tr>
                                   <td scope="row"><?= $i++; ?></td>
                                   <td><?= $menu_item->nama; ?></td>
                                   <td><?= $menu_item->harga; ?></td>
                                   <td class="text-center">
                                       <div class="btn-group">
                                           <a href="<?= site_url('Beranda/update_menu/' . $menu_item->id_makanan) ?>" class="btn btn-success">
                                               <i class="fas fa-user-pen"></i> Update
                                           </a>
                                           <a href="<?= site_url('Beranda/hapus_menu/' . $menu_item->id_makanan) ?>" class="btn btn-danger">
                                               <i class="fas fa-user-xmark"></i> Hapus
                                           </a>
                                       </div>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                       </tbody>
                   </table>
               </div>
               <div class="container mt-3">
                   <a href="<?= base_url('Beranda/tambah_menu') ?>" class="btn btn-success">Tambah</a>
               </div>
           <?php endif; ?>
           </div>
   </div>

   <?php if (empty($data_minuman->result())) : ?>
       <p>Tidak ada data menu.</p>
   <?php else : ?>
       <div id="TampilanMinuman" style="display: none;">
           <div class="container overflow-scroll" style="max-height: 400px;">
               <table class="table table-info table-striped table-hover table-rounded">
                   <thead>
                       <tr>
                           <th scope="col">No</th>
                           <th scope="col">Nama</th>
                           <th scope="col">Harga</th>
                           <th scope="col">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i = 1; ?>
                       <?php foreach ($data_minuman->result() as $menu_item) : ?>
                           <tr>
                               <td scope="row"><?= $i++; ?></td>
                               <td><?= $menu_item->nama; ?></td>
                               <td><?= $menu_item->harga; ?></td>
                               <td class="text-center">
                                   <div class="btn-group">
                                       <a href="<?= site_url('Beranda/update_menu_minuman/' . $menu_item->id_minuman) ?>" class="btn btn-success">
                                           <i class="fas fa-user-pen"></i> Update
                                       </a>
                                       <a href="<?= site_url('Beranda/hapus_menu_minuman/' . $menu_item->id_minuman) ?>" class="btn btn-danger">
                                           <i class="fas fa-user-xmark"></i> Hapus
                                       </a>
                                   </div>
                               </td>
                           </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
            </div>
            <div class="container mt-3">
                <a href="<?= base_url('Beranda/tambah_menu_minuman') ?>" class="btn btn-success">Tambah</a>
            </div>
       </div>
   <?php endif; ?>
   </div>

   
   <?php if (empty($data_cemilan->result())) : ?>
       <p>Tidak ada data menu.</p>
   <?php else : ?>
       <div id="TampilanCemilan" style="display: none;">
           <div class="container overflow-scroll" style="max-height: 400px;">
               <table class="table table-info table-striped table-hover table-rounded">
                   <thead>
                       <tr>
                           <th scope="col">No</th>
                           <th scope="col">Nama</th>
                           <th scope="col">Harga</th>
                           <th scope="col">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php $i = 1; ?>
                       <?php foreach ($data_cemilan->result() as $menu_item) : ?>
                           <tr>
                               <td scope="row"><?= $i++; ?></td>
                               <td><?= $menu_item->nama; ?></td>
                               <td><?= $menu_item->harga; ?></td>
                               <td class="text-center">
                                   <div class="btn-group">
                                       <a href="<?= site_url('Beranda/update_menu_cemilan/' . $menu_item->id_cemilan) ?>" class="btn btn-success">
                                           <i class="fas fa-user-pen"></i> Update
                                       </a>
                                       <a href="<?= site_url('Beranda/hapus_menu_cemilan/' . $menu_item->id_cemilan) ?>" class="btn btn-danger">
                                           <i class="fas fa-user-xmark"></i> Hapus
                                       </a>
                                   </div>
                               </td>
                           </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
            </div>
            <div class="container mt-3">
                <a href="<?= base_url('Beranda/tambah_menu_cemilan') ?>" class="btn btn-success">Tambah</a>
            </div>
       </div>
   <?php endif; ?>
   </div>

   <script>
       function showMakanan() {
           document.getElementById("TampilanMakanan").style.display = "block";
           document.getElementById("TampilanMinuman").style.display = "none";
           document.getElementById("TampilanCemilan").style.display = "none";
       }

       function showMinuman() {
           document.getElementById("TampilanMakanan").style.display = "none";
           document.getElementById("TampilanMinuman").style.display = "block";
           document.getElementById("TampilanCemilan").style.display = "none";
       }
       function showCemilan() {
           document.getElementById("TampilanCemilan").style.display = "block";
           document.getElementById("TampilanMakanan").style.display = "none";
           document.getElementById("TampilanMinuman").style.display = "none";
       }
   </script>