<?php $__env->startSection('content'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<style>
    /* 1. Global Background & Typography */
    .content-wrapper { background-color: #f4f7f6; font-family: 'Inter', sans-serif; }

    /* PERBAIKAN 1: HILANGKAN GARIS SCROLL */
    .custom-scroll::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
    width: 0;
}
.custom-scroll {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

/* Tambahan agar header sejajar */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 1.5rem;
}

    /* 3. Main Layout Constraint */
    .pos-container {
        height: calc(100vh - 120px);
        display: flex;
        gap: 25px;
        padding: 10px 0;
    }

    /* 4. Produk Section (Kiri) */
    .menu-section {
        flex: 1;
        overflow-y: auto;
        padding-right: 10px;
    }

    .menu-card {
        border: none;
        border-radius: 24px;
        background: #fff;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        border: 1px solid #edf2f7;
    }

    .menu-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(211, 84, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: #D35400;
    }

    .menu-img-wrapper {
        height: 150px;
        overflow: hidden;
        position: relative;
    }

    .menu-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .menu-card:hover .menu-img-wrapper img { transform: scale(1.15); }

    .price-tag {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 800;
        color: #D35400;
        font-size: 0.85rem;
    }

    /* 5. Cart Section (Kanan) */
    .checkout-panel {
        width: 350px;
        background: #fff;
        border-radius: 25px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #edf2f7;
    }

    .checkout-header { padding: 20px 25px 15px; }
    .checkout-body {
        min-height: 200px;
        max-height: 400px;
        overflow-y: auto;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .checkout-footer { padding: 15px 25px 25px; background: #fff; border-radius: 0 0 25px 25px; }

    /* 6. Buttons & Inputs */
    .btn-add-menu {
        background: #FFF4E6;
        color: #D35400;
        border: none;
        border-radius: 14px;
        padding: 10px;
        font-weight: 700;
        width: 100%;
        transition: 0.3s;
    }

    .btn-add-menu:hover { background: #D35400; color: #fff; }

    .btn-pay-now {
        background: #D35400;
        color: #fff;
        border: none;
        border-radius: 15px;
        padding: 12px;
        font-weight: 700;
        font-size: 1rem;
        box-shadow: 0 5px 10px rgba(211, 84, 0, 0.2);
        transition: 0.3s;
    }

    .cart-item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fa;
    }

    /* 7. CSS KHUSUS PRINT STRUK */
    @media print {
        body * { visibility: hidden; }
        #struk-cetak, #struk-cetak * { visibility: visible; }
        #struk-cetak {
            position: absolute;
            left: 0;
            top: 0;
            width: 80mm;
            font-family: 'Courier New', Courier, monospace;
            padding: 10px;
            color: black;
        }
        .no-print { display: none; }
    }
</style>

<div class="container-fluid py-4">
    <div class="row align-items-end mb-4">
        <div class="col">
            <h4 class="fw-bold text-dark mb-0">Kasir Pelani Dimsum 🥟</h4>
            <p class="text-muted small mb-0">Terminal Penjualan Utama</p>
        </div>

        <div class="col-auto">
            <div class="position-relative" style="width: 350px;"> <i class="fas fa-search position-absolute text-muted" style="left: 15px; top: 13px;"></i>
                <input type="text" id="search" class="form-control shadow-sm border-0"
                       placeholder="Cari menu dimsum..." onkeyup="searchProduk()"
                       style="border-radius: 15px; padding-left: 50px; height: 45px; background-color: white;">
            </div>
        </div>
    </div>
    <div class="pos-container">
        <div class="menu-section custom-scroll">
            <div class="row g-4" id="produk-list">
                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-xl-4 produk-item" data-nama="<?php echo e(strtolower($item->name_produk)); ?>">
                    <div class="card menu-card shadow-sm h-100">
                        <div class="menu-img-wrapper">
                            <img src="<?php echo e(asset('gambar_product/' . $item->gambar_product)); ?>" onerror="this.src='https://placehold.co/400x300?text=Menu';">
                            <div class="price-tag shadow-sm">Rp<?php echo e(number_format($item->harga, 0, ',', '.')); ?></div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-3"><?php echo e($item->name_produk); ?></h5>
                            <button class="btn btn-add-menu shadow-sm" onclick="tambahKeranjang(<?php echo e($item->produk_id); ?>, '<?php echo e($item->name_produk); ?>', <?php echo e($item->harga); ?>)">
                                <i class="fas fa-plus-circle me-2"></i> Tambah Ke Order
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="checkout-panel">
            <div class="checkout-header d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">Pesanan</h5>
                <span class="badge bg-soft-warning text-dark rounded-pill px-3" id="count-keranjang" style="background: #FFF4E6;">0 Items</span>
            </div>

            <div class="checkout-body custom-scroll" id="keranjang-list" style="padding: 10px;">
                <div class="text-center py-5" id="empty-state">
                    <i class="fas fa-shopping-bag fa-3x mb-3 text-light" style="color: #e0e0e0 !important;"></i>
                    <p class="text-muted small fw-bold">Belum ada pesanan</p>
                </div>
            </div>

            <div class="checkout-footer">
                <div id="alert-box"></div>
                <div class="d-flex justify-content-between mb-2 small">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-bold">Rp <span id="total-sub">0</span></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-dark fw-bold">Total Tagihan</span>
                    <span class="h5 fw-bold" style="color: #D35400;">Rp <span id="total">0</span></span>
                </div>
                <div class="form-group mb-3">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light border-0 fw-bold">Rp</span>
                        <input type="number" id="bayar" class="form-control border-light bg-light fw-bold" placeholder="Jumlah Bayar">
                    </div>
                </div>
                <button class="btn btn-pay-now w-100 mb-1" onclick="hitungKembalian()">
                    <i class="fas fa-check-circle me-2"></i> BAYAR SEKARANG
                </button>
                <div class="p-2 rounded bg-light d-flex justify-content-between align-items-center mb-3">
                    <span class="small fw-bold text-muted">KEMBALI</span>
                    <span class="fw-bold text-success">Rp <span id="kembalian">0</span></span>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <button class="btn btn-sm btn-outline-dark w-100 fw-bold" onclick="cetakStruk()">Struk</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-sm btn-outline-danger w-100 fw-bold" onclick="resetKeranjang()">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="struk-cetak" style="display: none; background: white; padding: 20px; color: #000; font-family: 'Courier New', Courier, monospace;">
    <div style="text-align: center; margin-bottom: 10px;">
        <h2 style="margin: 0; font-size: 18px; font-weight: bold;">PELANI DIMSUM</h2>
        <p style="font-size: 11px; margin: 2px 0;">Jl. Umban Sari, Pekanbaru</p>
        <p id="st-tanggal" style="font-size: 10px; margin: 0;"></p>
        <p style="margin: 5px 0;">--------------------------------</p>
    </div>

    <div id="struk-item-list" style="font-size: 12px; line-height: 1.4;"></div>

    <p style="margin: 5px 0; text-align: center;">--------------------------------</p>

    <div style="font-size: 12px;">
        <div style="display: flex; justify-content: space-between; font-weight: bold;">
            <span>TOTAL</span>
            <span id="st-total"></span>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <span>BAYAR</span>
            <span id="st-bayar"></span>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <span>KEMBALI</span>
            <span id="st-kembali"></span>
        </div>
    </div>

   <div style="text-align: center; margin-top: 20px; padding-bottom: 30px; page-break-inside: avoid;">
    <p style="font-weight: bold; margin: 0;">Terima Kasih 🙏</p>
    <p style="margin: 5px 0 0 0;">Selamat Menikmati 🥟</p>
</div>
</div>
</div>

<script>
    let keranjang = [];

    function tambahKeranjang(id, nama, harga){
        let item = keranjang.find(i => i.id === id);
        if(item){ item.qty++; }
        else{ keranjang.push({id, nama, harga, qty:1}); }
        renderKeranjang();
    }

    function renderKeranjang() {
    let list = document.getElementById('keranjang-list');
    let count = document.getElementById('count-keranjang');
    let totalSub = document.getElementById('total-sub');
    let totalTagihan = document.getElementById('total');

    list.innerHTML = ""; // Bersihkan list

    if (keranjang.length === 0) {
        list.innerHTML = `
            <div class="text-center py-5" id="empty-state">
                <i class="fas fa-shopping-bag fa-3x mb-3 text-light" style="color: #e0e0e0 !important;"></i>
                <p class="text-muted small fw-bold">Belum ada pesanan</p>
            </div>`;
        count.innerText = "0 Items";
        totalSub.innerText = "0";
        totalTagihan.innerText = "0";
        return;
    }

    let total = 0;
    let totalQty = 0;

    keranjang.forEach((item, index) => {
        let sub = item.harga * item.qty;
        total += sub;
        totalQty += item.qty;

        list.innerHTML += `
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <div style="flex: 1;">
                    <p class="mb-0 fw-bold text-dark small">${item.nama}</p>
                    <small class="text-muted">Rp ${item.harga.toLocaleString()}</small>
                </div>
                <div class="d-flex align-items-center">
                    <div class="btn-group btn-group-sm me-3">
                        <button class="btn btn-outline-secondary btn-sm px-2" onclick="hapusItem(${index})">-</button>
                        <span class="btn btn-light btn-sm disabled fw-bold" style="min-width: 30px;">${item.qty}</span>
                        <button class="btn btn-outline-secondary btn-sm px-2" onclick="tambahKeranjang('${item.id}', '${item.nama}', ${item.harga})">+</button>
                    </div>
                    <div class="text-end" style="min-width: 80px;">
                        <p class="mb-0 fw-bold text-dark small">Rp ${sub.toLocaleString()}</p>
                    </div>
                </div>
            </div>`;
    });

    totalSub.innerText = total.toLocaleString();
    totalTagihan.innerText = total.toLocaleString();
    count.innerText = totalQty + " Items";
}

    function hapusItem(index) {
        if(keranjang[index].qty > 1) { keranjang[index].qty--; }
        else { keranjang.splice(index, 1); }
        renderKeranjang();
    }

    function hitungKembalian(){
        let totalVal = parseInt(document.getElementById('total').innerText.replace(/\D/g, ''));
        let bayarVal = document.getElementById("bayar").value;
        if(keranjang.length === 0){ tampilkanAlert("Order kosong!", "warning"); return; }
        if(bayarVal < totalVal || bayarVal === ""){ tampilkanAlert("Uang tidak cukup!", "danger"); return; }

        let kembalian = bayarVal - totalVal;
        document.getElementById("kembalian").innerText = kembalian.toLocaleString();
        tampilkanAlert("Pembayaran Berhasil!", "success");
    }

    function cetakStruk() {
    if (keranjang.length === 0) {
        tampilkanAlert("Order Kosong!", "warning");
        return;
    }

    // Update Data
    document.getElementById('st-tanggal').innerText = new Date().toLocaleString('id-ID');

    let listStruk = document.getElementById('struk-item-list');
    listStruk.innerHTML = "";
    keranjang.forEach(item => {
        listStruk.innerHTML += `
            <div style="display:flex; justify-content:space-between; width: 100%; margin-bottom: 3px;">
                <span style="flex: 1; padding-right: 10px;">${item.nama} x${item.qty}</span>
                <span style="white-space: nowrap;">Rp ${(item.harga * item.qty).toLocaleString()}</span>
            </div>`;
    });

    document.getElementById('st-total').innerText = "Rp " + document.getElementById('total').innerText;
    document.getElementById('st-bayar').innerText = "Rp " + parseInt(document.getElementById('bayar').value || 0).toLocaleString();
    document.getElementById('st-kembali').innerText = "Rp " + document.getElementById('kembalian').innerText;

    const element = document.getElementById('struk-cetak');
    element.style.display = 'block';

    const opt = {
        margin:       [5, 5, 5, 5],
        filename:     'Struk_Pelani_Dimsum.pdf',
        image:        { type: 'jpeg', quality: 1 },
        html2canvas:  {
            scale: 2,
            useCORS: true,
            // Penting: pastikan seluruh elemen dicapture walau panjang
            scrollY: 0,
            height: element.offsetHeight
        },
        jsPDF: {
            unit: 'mm',
            // Ubah format menjadi 'auto' agar tinggi kertas mengikuti konten
            format: [85, (element.offsetHeight * 0.2645) + 20],
            orientation: 'portrait'
        }
    };

    setTimeout(() => {
        html2pdf().set(opt).from(element).save().then(() => {
            element.style.display = 'none';
        });
    }, 500);
}

    function resetKeranjang(){
        if(confirm("Hapus semua pesanan?")){
            keranjang = [];
            document.getElementById("bayar").value = "";
            document.getElementById("kembalian").innerText = "0";
            renderKeranjang();
        }
    }

    function searchProduk(){
        let input = document.getElementById("search").value.toLowerCase();
        let items = document.querySelectorAll(".produk-item");
        items.forEach(item => {
            let nama = item.getAttribute("data-nama");
            item.style.display = nama.includes(input) ? "block" : "none";
        });
    }

    function tampilkanAlert(pesan, tipe){
        let box = document.getElementById("alert-box");
        box.innerHTML = `<div class="alert alert-${tipe} py-2 small text-center fw-bold mb-3" style="border-radius: 12px;">${pesan}</div>`;
        setTimeout(() => box.innerHTML = "", 3000);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/kasir/index.blade.php ENDPATH**/ ?>