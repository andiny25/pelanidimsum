<?php $__env->startSection('content'); ?>
<style>
    /* 1. Pembersihan Pagination (Menghilangkan "Showing...") */
    .pagination-wrapper nav div:first-child {
        display: none !important;
    }
    .pagination-wrapper nav div:last-child {
        display: flex !important;
        justify-content: flex-end;
        width: 100%;
    }

    /* 2. Styling Warna Orange Pelani */
    .page-item.active .page-link {
        background-color: #D35400 !important;
        border-color: #D35400 !important;
        color: white !important;
    }
    .page-link {
        color: #D35400 !important;
        border-radius: 8px !important;
    }

    /* 3. Menghilangkan Warna Biru pada Input & Select */
    .form-control:focus, .form-select:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
    }

    /* Warna Header Tabel */
    .table-thead-custom {
        background: #FFF4E6;
        color: #D35400;
    }

    /* Styling Button Search & Clear */
    .btn-pelani {
        background: #D35400;
        color: white;
    }
    .btn-pelani:hover {
        background: #A04000;
        color: white;
    }
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    
                </li>
                
            </ol>
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Data Pelanggan</h2>
        <p class="mb-0" style="color: #8B5E3C;">Kelola list data pelanggan sistem Pelani.</p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('pelanggan.create')); ?>"
            class="btn btn-sm shadow-sm text-white d-inline-flex align-items-center"
            style="background: #D35400; border: none; padding: 10px 20px; border-radius: 8px;">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Pelanggan
        </a>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success border-0 shadow-sm" style="border-radius: 10px;">
        <i class="fas fa-check-circle me-2"></i> Penambahan data berhasil
    </div>
<?php endif; ?>

<div class="card border-0 shadow mb-4" style="border-radius: 15px;">
    <div class="card-body">

        
        <div class="mb-4">
            <form method="GET" action="<?php echo e(route('pelanggan.list')); ?>">
                <div class="row g-3">
                    <div class="col-md-3">
                        <select name="gender" onchange="this.form.submit()" class="form-select border-light shadow-sm">
                            <option value="">Semua Gender</option>
                            <option value="Male" <?php echo e(request('gender') == 'Male' ? 'selected' : ''); ?>>Laki-laki</option>
                            <option value="Female" <?php echo e(request('gender') == 'Female' ? 'selected' : ''); ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="birthday" class="form-select border-light shadow-sm" onchange="this.form.submit()">
                            <option value="">Tahun Lahir</option>
                            <?php for($i = 2026; $i >= 1970; $i--): ?>
                                <option value="<?php echo e($i); ?>" <?php echo e(request('birthday') == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group shadow-sm">
                            <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control border-light" placeholder="Cari nama atau email...">
                            <button type="submit" class="btn text-white" style="background: #D35400;">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                            <?php if(request('search')): ?>
                                <a href="<?php echo e(route('pelanggan.list')); ?>" class="btn btn-outline-secondary">Clear</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-items-center">
                <thead class="table-thead-custom">
                    <tr>
                        <th class="border-0 rounded-start">No</th>
                        <th class="border-0">Nama Depan</th>
                        <th class="border-0">Nama Belakang</th>
                        <th class="border-0">Gender</th>
                        <th class="border-0">Tanggal Lahir</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Telepon</th>
                        <th class="border-0 rounded-end text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $dataPelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="fw-bold text-muted"><?php echo e(($dataPelanggan->currentPage() - 1) * $dataPelanggan->perPage() + $loop->iteration); ?></td>
                        <td><span class="fw-bold" style="color: #5A3E2B;"><?php echo e($row->first_name); ?></span></td>
                        <td><?php echo e($row->last_name); ?></td>
                        <td>
                             <span class="badge <?php echo e($row->gender == 'Male' ? 'bg-gray-200 text-gray-800' : 'bg-secondary'); ?>" style="border-radius: 5px;">
                                <?php echo e($row->gender); ?>

                             </span>
                        </td>
                        <td><?php echo e($row->birthday); ?></td>
                        <td><?php echo e($row->email); ?></td>
                        <td><?php echo e($row->phone); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?php echo e(route('pelanggan.edit',$row->pelanggan_id)); ?>" class="btn btn-sm me-2 shadow-sm"
                                   style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px;">
                                    Edit
                                </a>
                                <a href="<?php echo e(route('pelanggan.destroy',$row->pelanggan_id)); ?>" class="btn btn-sm text-white shadow-sm"
                                   style="background: #D35400; border-radius: 8px;"
                                   onclick="return confirm('Hapus pelanggan ini?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-4 pagination-wrapper">
                <?php echo e($dataPelanggan->links('pagination::bootstrap-5')); ?>

            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/pelanggan/index.blade.php ENDPATH**/ ?>