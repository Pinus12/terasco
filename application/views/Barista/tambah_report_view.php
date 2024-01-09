<div class="container-fluid d-flex justify-content-center">
    <div class="row">
        <div class="col-lg-5 col-6 text-center">
            <button type="button" class="btn btn-info" onclick="getData('food')">Makanan</button>
            <!-- Tambahkan tombol untuk Minuman dan Snack jika diperlukan -->
        </div>
        <!-- Tombol yang memicu modal -->
        <div class="col-lg-5 col-6 text-center">
            <button type="button" class="btn btn-info" onclick="getData('drink')">Minuman</button>
            <!-- Tambahkan tombol untuk Minuman dan Snack jika diperlukan -->
        </div>
        <div class="col-lg-5 col-6 text-center">
            <button type="button" class="btn btn-info" onclick="getData('cemilan')">Cemilan</button>
            <!-- Tambahkan tombol untuk Minuman dan Snack jika diperlukan -->
        </div>
        <div class="col-lg-5 col-6 text-center">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
                Buka Modal
            </button>
        </div>
        <div class="col-lg-5 col-6 text-center">
            <button id="resetButton" type="button" class="btn btn-danger">Reset</button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Jenis Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Konten modal di sini -->
                <button type="button" class="btn btn-primary" data-input-id="bcaInput" onclick="modalApply(this)">BCA</button>
                <button type="button" class="btn btn-primary" data-input-id="cashInput" onclick="modalApply(this)">Cash</button>
                <button type="button" class="btn btn-primary" data-input-id="qrInput" onclick="modalApply(this)">QR</button>
                <button type="button" class="btn btn-primary" data-input-id="gojekInput" onclick="modalApply(this)">Gojek</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="<?= base_url('Beranda/form_report') ?>" class="btn btn-primary" onclick="simpanPerubahan()" data-bs-dismiss="modal">Simpan Perubahan</a>
            </div>
        </div>
    </div>
</div>

<div id="result-container" class="container text-center mt-12"></div>

<script>
    var totalHarga = 0;
    document.getElementById('resetButton').addEventListener('click', function() {
        // Panggil fungsi resetCounts untuk mengatur ulang nilai count dan tampilan jumlah pada setiap card
        resetCounts();
        getData('food');
    });

    function resetCounts() {
        // Setel nilai count menjadi 0 untuk setiap item
        for (var itemName in counts) {
            if (counts.hasOwnProperty(itemName)) {
                counts[itemName] = 0;
                // Dapatkan elemen count untuk item yang sesuai dan perbarui tampilan jumlah
                var countElement = document.querySelector('.container').querySelector('[data-item="' + itemName + '"]');
                if (countElement) {
                    countElement.textContent = 'Jumlah: 0';
                }
            }
        }

        // Setel total harga menjadi 0
        totalHarga = 0;
        // Panggil fungsi handleTotalHargaChange untuk memperbarui input element
        handleTotalHargaChange(totalHarga);
    }

    function getData(type) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                showResult(data);
            }
        };

        var url;
        if (type === 'food') {
            url = "<?php echo base_url('Beranda/getFoodData'); ?>";
        } else if (type === 'drink') {
            url = "<?php echo base_url('Beranda/getDrinkData'); ?>";
        } else if (type === 'cemilan') {
            url = "<?php echo base_url('Beranda/getCemilanData'); ?>";
        } else {
            // Mungkin tambahkan logika tambahan jika diperlukan
            console.error("Jenis data tidak valid");
            return;
        }

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("type=" + type);
    }

    var resultContainer = document.getElementById('result-container');

    function showResult(data) {
        resultContainer.innerHTML = ''; // Hapus konten sebelumnya

        var h4 = document.createElement('h4');
        h4.textContent = "Data:";
        resultContainer.appendChild(h4);

        if (data.food && data.food.length > 0) {
            displayData(data.food);
        } else if (data.drink && data.drink.length > 0) {
            displayData(data.drink);
        } else if (data.cemilan && data.cemilan.length > 0) {
            displayData(data.cemilan);
        } else {
            var p = document.createElement('p');
            p.textContent = "Tidak ada data.";
            resultContainer.appendChild(p);
        }
    }

    // Objek untuk menyimpan nilai count dan total harga untuk setiap item
    var counts = {};

    function displayData(dataArray) {
        var container = document.querySelector('.container');
        container.classList.add('mt-12');
        container.style.maxHeight = '450px';
        container.style.overflowY = 'auto';
        container.innerHTML = '';

        var row = document.createElement('div');
        row.classList.add('row');
        container.appendChild(row);

        dataArray.forEach(function(item) {
            var col = document.createElement('div');
            col.classList.add('col-lg-4', 'col-md-6', 'mb-4');
            row.appendChild(col);

            var card = document.createElement('div');
            card.classList.add('card');
            card.style.width = '18rem';

            var cardBody = document.createElement('div');
            cardBody.classList.add('card-body');

            if (item.hasOwnProperty('nama')) {
                var title = document.createElement('h5');
                title.classList.add('card-title');
                title.textContent = item.nama;
                cardBody.appendChild(title);
            } else {
                console.error("Properti 'nama' tidak ditemukan dalam objek:", item);
            }

            var text = document.createElement('p');
            text.classList.add('card-text');
            text.textContent = 'Harga: ' + item.harga;

            // Tambahkan elemen untuk menampilkan nilai angka
            var countElement = document.createElement('p');
            countElement.textContent = 'Jumlah: ' + (counts[item.nama] || 0); // Gunakan nilai default 0
            countElement.classList.add('mb-2'); // Menambahkan margin-bottom

            cardBody.appendChild(text);
            cardBody.appendChild(countElement);

            var link = document.createElement('a');
            link.classList.add('btn', 'btn-primary');
            link.textContent = 'Tambah';

            // Tambahkan event listener untuk menangani klik pada tombol "Tambah"
            link.addEventListener('click', function() {
                // Ambil nilai count dari objek counts
                var count = counts[item.nama] || 0;

                // Increment nilai angka
                count++;

                // Perbarui nilai count pada objek counts
                counts[item.nama] = count;

                // Perbarui tampilan nilai angka
                countElement.textContent = 'Jumlah: ' + count;
                // console.log('Isi counts:', JSON.stringify(Object.values(counts), null, 2)); // buat ambil key
                // console.log('Isi counts:', JSON.stringify(Object.keys(counts), null, 2)); // buat ambil value
                console.log('Isi counts:', JSON.stringify(counts, null, 2)); // buat ambil value
                // Perbarui total harga keseluruhan
                totalHarga += parseInt(item.harga);
                console.log('Total Harga Keseluruhan: ' + totalHarga);
                // Panggil fungsi handleTotalHargaChange untuk memperbarui input element
                handleTotalHargaChange(totalHarga);
            });

            cardBody.appendChild(link);
            card.appendChild(cardBody);
            col.appendChild(card);
        });
    }


    function handleTotalHargaChange(newTotalHarga) {
        totalHarga = newTotalHarga;
        updateCashInput(); // Perbarui elemen input saat totalHarga berubah
    }

    function createInputContainer(label1, id1, label2, id2, label3, id3, label4, id4) {
        // Buat elemen container-fluid
        var fluidContainer = document.createElement('div');
        fluidContainer.classList.add('container', 'text-center', 'd-flex', 'justify-content-center');

        // Buat elemen row untuk tata letak horizontal
        var row = document.createElement('div');
        row.classList.add('row');

        // Buat elemen container
        var container1 = createInputGroup(label1, id1);
        var container2 = createInputGroup(label2, id2);
        var container3 = createInputGroup(label3, id3);
        var container4 = createInputGroup(label4, id4);

        // Gabungkan inputGroup ke dalam container
        row.appendChild(container1);
        row.appendChild(container2);
        row.appendChild(container3);
        row.appendChild(container4);

        fluidContainer.appendChild(row);
        // Sisipkan fluidContainer ke dalam dokumen
        document.body.appendChild(fluidContainer);
        // updateCashInput();
    }

    function createInputGroup(label, id) {
        var container = document.createElement('div');
        container.classList.add('col-lg-5', 'col-8', 'mt-3', 'text-center', 'mx-auto');
        var inputGroup = document.createElement('div');

        var inputLabel = document.createElement('span');
        inputLabel.textContent = label;

        var inputElement = document.createElement('input');
        inputElement.id = id;
        inputElement.type = 'text';
        inputElement.value = 0;
        inputElement.disabled = true;
        inputElement.setAttribute('aria-label', 'Sizing example input');
        inputElement.setAttribute('aria-describedby', 'inputGroup-sizing-default');

        inputGroup.appendChild(inputLabel);
        inputGroup.appendChild(inputElement);

        container.appendChild(inputGroup);

        return container;

    }

    var totalBCA = 0; // Variabel global untuk total uang
    var totalCash = 0;
    var totalGojek = 0;
    var totalQR = 0;

    function modalApply(button) {
        // Ambil nilai dari atribut data-input-id
        var inputId = button.getAttribute('data-input-id');
        var halo = 0;
        // Periksa apakah nilai sama dengan "bcaInput"
        if (inputId === 'bcaInput') {
            var inputElement = document.getElementById('bcaInput');

            // Perbarui nilai totalUang dengan menambahkannya ke totalHarga saat ini
            totalBCA += totalHarga;

            // Perbarui nilai inputElement dengan nilai totalUang saat ini
            inputElement.value = totalBCA;
            resetCounts()
            getData('food')
            console.log('Total Harga Keseluruhan: ' + totalHarga);
            console.log('Total Uang: ' + totalBCA);
            console.log('Input Element Value: ' + inputElement.value);
        }
        // Lakukan operasi lain yang diperlukan
        else if (inputId === 'cashInput') {
            var inputElement = document.getElementById('cashInput');

            // Perbarui nilai totalUang dengan menambahkannya ke totalHarga saat ini
            totalCash += totalHarga;

            // Perbarui nilai inputElement dengan nilai totalUang saat ini
            inputElement.value = totalCash;
            resetCounts()
            getData('food')
            console.log('Total Harga Keseluruhan: ' + totalHarga);
            console.log('Total Uang: ' + totalCash);
            console.log('Input Element Value: ' + inputElement.value);

        } else if (inputId === 'gojekInput') {
            var inputElement = document.getElementById('gojekInput');

            // Perbarui nilai totalUang dengan menambahkannya ke totalHarga saat ini
            totalGojek += totalHarga;

            // Perbarui nilai inputElement dengan nilai totalUang saat ini
            inputElement.value = totalGojek;
            resetCounts()
            getData('food')
            console.log('Total Harga Keseluruhan: ' + totalHarga);
            console.log('Total Uang: ' + totalGojek);
            console.log('Input Element Value: ' + inputElement.value);

        } else {
            var inputElement = document.getElementById('qrInput');

            // Perbarui nilai totalUang dengan menambahkannya ke totalHarga saat ini
            totalQR += totalHarga;

            // Perbarui nilai inputElement dengan nilai totalUang saat ini
            inputElement.value = totalQR;
            resetCounts()
            getData('food')
            console.log('Total Harga Keseluruhan: ' + totalHarga);
            console.log('Total Uang: ' + totalQR);
            console.log('Input Element Value: ' + inputElement.value);

        }
    }

    function simpanPerubahan() {
        console.log('totalBCA sebelum di fetch:', totalBCA);
        fetch('http://localhost/terasProjek/report/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    Cash: parseFloat(totalCash) || 0,
                    BCA: parseFloat(totalBCA) || 0,
                    Gojek: parseFloat(totalGojek) || 0,
                    QR: parseFloat(totalQR) || 0,
                }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response Gagal');
                }
                return response.json();
            })
            .then(data => {
                console.log('Data berhasil dikirim ke server', data);
                // Setelah selesai operasi, lakukan navigasi ke URL yang diinginkan
                window.location.href = '<?= base_url("Beranda/form_report") ?>';
            })
            .catch(error => {
                console.error('Gagal mengirim data ke server:', error);
            });
    }


    createInputContainer('BCA', 'bcaInput', 'Cash', 'cashInput', 'QR Code', 'qrInput', 'Gojek', 'gojekInput');

    function updateCashInput() {
        // Temukan elemen input
        var inputElement = document.getElementById('cashInput');

        // Perbarui nilainya dengan nilai totalHarga saat ini
        // inputElement.value = totalHarga;
    }

    displayData(NaN);


</script>