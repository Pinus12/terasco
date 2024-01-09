<div class="container mt-12">
    <h3>Laporan</h3>
    <form action="<?= base_url('beranda/simpan_form_report') ?>" method="post">

    <label for="exampleFormControlInput1" class="form-label">Shift</label>
        <select class="form-select" name="shift" aria-label="Default select example">
            <option selected disabled>Open this select menu</option>
            <option value="Shift-1">Shift-1</option>
            <option value="Shift-2">Shift-2</option>
        </select>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Uang Kas</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="" name="uang_kas">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Cup Awal</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="cup_awal">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Cup Terpakai</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="cup_terpakai">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Cup Sisa</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="cup_sisa">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">BCA</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled name="form_bca" value="<?= $report_data['BCA'] ?>">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Gojek</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled name="form_gojek" value="<?= $report_data['Gojek'] ?>">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">QR</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled name="form_qr" value="<?= $report_data['QR'] ?>">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Cash</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled name="form_cash" value="<?= $report_data['Cash'] ?>">
        </div>
        <div class="container d-flex justify-content-end align-items-center">
            <button class="btn btn-success mt-3">Apply</button>
    </form>
</div>