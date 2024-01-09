<div class="container mt-12">
  <h3>Laporan</h3>
  <div class="">
    <label for="exampleFormControlInput1" class="form-label">Shift</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled value="<?= $report_data['Shift'] ?>">
  </div>
  <div class="">
    <label for="exampleFormControlInput1" class="form-label">Uang Kas</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled value="<?= $report_data['Kas'] ?>">
  </div>
  <div class="">
    <label for="exampleFormControlInput1" class="form-label">Cup Awal</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled value="<?= $report_data['cup_awal'] ?>">
  </div>
  <div class="">
    <label for="exampleFormControlInput1" class="form-label">Cup Terpakai</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled value="<?= $report_data['cup_terpakai'] ?>">
  </div>
  <div class="">
    <label for="exampleFormControlInput1" class="form-label">Cup Sisa</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" disabled value="<?= $report_data['cup_sisa'] ?>">
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
    <div class="container d-flex justify-content-between align-items-center">
      <a href="<?= base_url('beranda/history_report') ?>" class="btn btn-danger mt-3">Kembali</a>
      <button class="btn btn-success mt-3">Cetak PDF</button>
    </div>