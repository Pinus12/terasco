<div class="container text-start col-lg-2 mt-12 ms-0">
    <div class="container">
        <label for="filterDate" class="form-label">Cari Laporan</label>
    </div>
    <div class="container d-flex justify-content-start">
        <input type="date" class="form-control text-start" id="filterDate" onchange="filterEntries()">
    </div>
</div>

<div class="container-fluid" style="max-height: 637px; overflow-y: auto;">
    <?php $i = 0 ?>
    <?php $filterDate = isset($_GET['date']) ? $_GET['date'] : null; ?>
    <?php for ($x = sizeof($history_entries) % 2 == 0 ? 0 : 1; $x < sizeof($history_entries); $x += 2, $i++) : ?>
        <?php if ($filterDate === null || $filterDate == $history_entries[$x]['Date']) : ?>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6 class=""><?= $history_entries[$x]['Date'] ?></h6>
                        <div>
                            <button type="button" class="btn btn-tool stretched-link" data-bs-toggle="collapse" data-bs-target="#collapseSenin<?= $i ?>" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse" id="collapseSenin<?= $i ?>">
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="container-fluid d-flex align-items-center">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <h6 class="mb-1 text-dark text-sm"></h6>
                                            <div class="d-flex align-items-center">
                                                <span class="font-weight-bold mx-2">Shift 1</span>
                                                <a href="<?= base_url('beranda/lihat_report/' . $history_entries[$x + 1]['id_report']) ?>" class="btn btn-primary btn-sm mx-2">
                                                    Lihat Report
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="container-fluid d-flex align-items-center">
                                        <div class="text-center"></div>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <h6 class="mb-1 text-dark text-sm"></h6>
                                            <div class="d-flex align-items-center">
                                                <span class="font-weight-bold mx-2">Shift 2</span>
                                                <a href="<?= base_url('beranda/lihat_report/' . $history_entries[$x]['id_report']) ?>" class="btn btn-primary btn-sm mx-2">
                                                    Lihat Report
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</div>

<script>
    // Fungsi untuk memfilter entri berdasarkan tanggal
    function filterEntries() {
        // Dapatkan nilai tanggal dari input
        var filterDate = document.getElementById('filterDate').value;

        // Redirect ke halaman dengan parameter query string date
        window.location.href = 'history_report?date=' + filterDate;
    }
</script>
