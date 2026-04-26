<?php $__env->startSection('content'); ?>
<style>
    /* 1. Menghilangkan teks "Showing X to Y of Z results" secara total */
    .pagination-wrapper nav div:first-child {
        display: none !important;
    }

    .pagination-wrapper nav div:last-child {
        display: flex !important;
        justify-content: flex-end;
        width: 100%;
    }

    /* 2. PERBAIKAN: Warna Oranye saat Input & Dropdown diklik (Focus) */
    .form-control:focus,
    .form-select:focus {
        border-color: #D35400 !important; /* Border jadi orange */
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important; /* Glow orange */
        outline: none !important;
    }

    /* 3. PERBAIKAN: Menghilangkan warna biru pada item dropdown */
    /* Catatan: Browser modern sangat membatasi styling pada elemen <option> bawaan HTML */
    .form-select option:checked {
        background-color: #D35400 !important;
        color: white !important;
    }

    /* 4. Styling Navigasi Angka */
    .pagination .page-item { margin: 0 2px; }

    .page-item.active .page-link {
        background-color: #D35400 !important;
        border-color: #D35400 !important;
        color: white !important;
    }
    .page-link {
        color: #D35400 !important;
        border-radius: 8px !important;
    }

    /* Badge Role Styling */
    .badge-role {
        font-size: 0.85rem !important;
        padding: 8px 15px !important;
        border-radius: 10px;
        font-weight: 600;
        display: inline-block;
        min-width: 110px;
        text-align: center;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Data User</h2>
        <p class="mb-0" style="color: #8B5E3C;">Kelola daftar pengguna sistem Pelani.</p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('user.create')); ?>"
           class="btn btn-sm shadow-sm text-white d-inline-flex align-items-center"
           style="background: #D35400; border: none; padding: 10px 20px; border-radius: 8px;">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah User
        </a>
    </div>
</div>

<div class="card border-0 shadow mb-4" style="border-radius: 15px;">
    <div class="card-body">

        
        <form method="GET" action="<?php echo e(route('user.list')); ?>" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <select name="role" onchange="this.form.submit()" class="form-select border-light shadow-sm">
                        <option value="">Semua Role</option>
                        <option value="Super Admin" <?php echo e(request('role') == 'Super Admin' ? 'selected' : ''); ?>>Super Admin</option>
                        <option value="Administrator" <?php echo e(request('role') == 'Administrator' ? 'selected' : ''); ?>>Administrator</option>
                        <option value="Pelanggan" <?php echo e(request('role') == 'Pelanggan' ? 'selected' : ''); ?>>Pelanggan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="input-group shadow-sm">
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control border-light" placeholder="Cari nama atau email...">
                        <button type="submit" class="btn text-white" style="background: #D35400;">Cari</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-items-center">
                <thead style="background: #FFF4E6; color: #D35400;">
                    <tr>
                        <th class="border-0 rounded-start">NO</th>
                        <th class="border-0">PROFIL</th>
                        <th class="border-0">NAMA LENGKAP</th>
                        <th class="border-0">EMAIL</th>
                        <th class="border-0">ROLE</th>
                        <th class="border-0 rounded-end text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $dataUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-muted fw-bold"><?php echo e(($dataUser->currentPage() - 1) * $dataUser->perPage() + $loop->iteration); ?></td>
                            <td>
                                <?php if($row->avatar): ?>
                                    <img src="<?php echo e(asset('avatar/' . $row->avatar)); ?>" class="rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover; border: 2px solid #D35400;">
                                <?php else: ?>
                                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-light" style="width: 45px; height: 45px; border: 2px solid #D35400; color: #D35400;">
                                        <i class="fas fa-user text-xs"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><span class="fw-bold" style="color: #5A3E2B;"><?php echo e($row->name); ?></span></td>
                            <td><?php echo e($row->email); ?></td>
                            <td>
                                <?php
                                    $roleStyle = match($row->role) {
                                        'Super Admin' => 'background: #4B3621; color: white;',
                                        'Administrator' => 'background: #D35400; color: white;',
                                        'Pelanggan' => 'background: #8B5E3C; color: white;',
                                        default => 'background: #E67E22; color: white;',
                                    };
                                ?>
                                <span class="badge-role" style="<?php echo e($roleStyle); ?>">
                                    <?php echo e($row->role); ?>

                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('user.edit', $row->id)); ?>" class="btn btn-sm me-2 shadow-sm"
                                       style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px;">
                                        Edit
                                    </a>
                                    <a href="<?php echo e(route('user.destroy', $row->id)); ?>" class="btn btn-sm text-white shadow-sm"
                                       style="background: #D35400; border-radius: 8px;"
                                       onclick="return confirm('Hapus user ini?')">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="mt-4 pagination-wrapper">
            <?php echo e($dataUser->links('pagination::bootstrap-5')); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pelanidimsum\resources\views/admin/user/index.blade.php ENDPATH**/ ?>