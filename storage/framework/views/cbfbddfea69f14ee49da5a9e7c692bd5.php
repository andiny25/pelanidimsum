<?php $__env->startSection('content'); ?>
<style>
    /* Sinkronisasi warna dengan Index User */
    .breadcrumb-item a, .breadcrumb-item.active {
        color: #8B5E3C !important;
    }

    /* Styling Table Header & Hover */
    .thead-light th {
        background-color: #FFF4E6 !important; /* Krem Pelani */
        color: #D35400 !important; /* Orange Pelani */
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
    }

    .table-centered tbody tr:hover {
        background-color: #fdfaf7;
        transition: 0.3s;
    }

    /* Button Styling */
    .btn-success-custom {
        background: #D35400 !important;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
    }

    .btn-info-custom {
        background: #FFF4E6 !important;
        color: #5A3E2B !important;
        border: 1px solid #5A3E2B !important;
        border-radius: 8px;
    }

    .btn-danger-custom {
        background: #D35400 !important;
        color: white !important;
        border-radius: 8px;
        border: none;
    }

    /* Text & Image Styling */
    .price-text {
        color: #D35400;
        font-weight: 700;
    }
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                
                
            </ol>
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Data Produk</h2>
        <p class="mb-0" style="color: #8B5E3C;">Daftar produk yang tersedia di sistem.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-sm btn-success-custom text-white d-inline-flex align-items-center shadow-sm">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Produk
        </a>
    </div>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #E8F5E9; color: #2E7D32; border-radius: 10px;">
        <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow mb-4" style="border-radius: 15px;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Nama Produk</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0">Deskripsi</th>
                        <th class="border-0">Gambar Produk</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; ?>
                    <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted fw-bold"><?php echo e(++$no); ?></td>
                            <td><span class="fw-bold" style="color: #5A3E2B;"><?php echo e($row->name_produk); ?></span></td>
                            <td>
                                <?php
                                    $hargaClean = preg_replace('/[^0-9.]/', '', $row->harga);
                                    $hargaFinal = is_numeric($hargaClean) ? (float)$hargaClean : 0;
                                ?>
                                <span class="price-text">Rp <?php echo e(number_format($hargaFinal, 0, ',', '.')); ?></span>
                            </td>
                            <td><small class="text-muted"><?php echo e(str()->limit($row->deskripsi, 50, '...')); ?></small></td>
                            <td>
                                <?php if($row->gambar_product && file_exists(public_path('gambar_product/'.$row->gambar_product))): ?>
                                    <img src="<?php echo e(asset('gambar_product/'.$row->gambar_product)); ?>"
                                         width="65" height="65"
                                         style="border-radius:12px; object-fit: cover; border: 2px solid #D35400;"
                                         class="shadow-sm">
                                <?php else: ?>
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="width: 65px; height: 65px; border-radius: 12px; border: 2px solid #D35400; color: #D35400;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('produk.edit', $row->produk_id)); ?>" class="btn btn-info-custom btn-sm me-1 shadow-sm">
                                    Edit
                                </a>
                                <form action="<?php echo e(route('produk.destroy', $row->produk_id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger-custom btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3" style="color: #FFF4E6;"></i>
                                <p>Tidak ada data produk untuk ditampilkan.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pelanidimsum\resources\views/admin/produk/index.blade.php ENDPATH**/ ?>