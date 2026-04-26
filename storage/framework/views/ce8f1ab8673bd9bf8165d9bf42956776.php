<?php $__env->startSection('content'); ?>
<style>
    /* Sinkronisasi warna dengan Form Tambah User */
    .form-control:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
    }

    .breadcrumb-item a, .breadcrumb-item.active {
        color: #8B5E3C !important;
    }

    .btn-save {
        background: #D35400 !important;
        color: white !important;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-back {
        background: #FFF4E6 !important;
        color: #5A3E2B !important;
        border: 1px solid #D2B48C !important;
        border-radius: 8px;
        padding: 8px 20px;
    }

    label {
        font-weight: 600;
        color: #5A3E2B;
        margin-bottom: 8px;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                
                
            </ol>
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Tambah Produk Baru</h2>
        <p class="mb-0" style="color: #8B5E3C;">Silakan isi formulir di bawah untuk menambahkan produk baru.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('produk.list')); ?>" class="btn btn-sm btn-back shadow-sm d-inline-flex align-items-center">
            Kembali
        </a>
    </div>
</div>


<div class="card card-body border-0 shadow mb-4" style="border-radius: 15px;">
    <h2 class="h5 mb-4" style="color: #D35400; font-weight: 700;">Informasi Produk</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 10px;">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="row">
            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="name_produk">Nama Produk</label>
                    <input class="form-control border-light shadow-sm" id="name_produk" name="name_produk" type="text"
                        placeholder="Masukkan nama produk" required style="border-radius: 8px;">
                </div>
            </div>

            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input class="form-control border-light shadow-sm" id="harga" name="harga" type="number"
                        placeholder="Contoh: 15000" required style="border-radius: 8px;">
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control border-light shadow-sm" id="deskripsi" name="deskripsi"
                        rows="2" placeholder="Masukkan deskripsi produk..." required style="border-radius: 8px;"></textarea>
                </div>
            </div>

            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="gambar_product">Foto Produk</label>
                    <input class="form-control border-light shadow-sm" id="gambar_product" type="file" name="gambar_product"
                        style="border-radius: 8px;">
                    <small class="text-muted mt-2 d-block">Gunakan foto produk terbaik dengan format JPG/PNG.</small>
                </div>
            </div>
        </div>

       <div class="mt-4 pt-4 border-top text-end">
            <button class="btn btn-save shadow-sm animate-up-2" type="submit">
                Simpan Produk
            </button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/produk/create.blade.php ENDPATH**/ ?>