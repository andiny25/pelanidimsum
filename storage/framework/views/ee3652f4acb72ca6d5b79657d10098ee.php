<?php $__env->startSection('content'); ?>
<style>
    /* Styling Dasar Form */
    .form-control:focus, .form-select:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
    }

    /* Warna Label agar senada dengan Sidebar */
    label {
        color: #5A3E2B;
        font-weight: 600;
        margin-bottom: 8px;
    }

    /* Card Styling */
    .card-custom {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    /* Breadcrumb Warna Cokelat */
    .breadcrumb-item a, .breadcrumb-item.active {
        color: #8B5E3C !important;
    }

    /* Warna dropdown saat dipilih */
    .form-select option {
        color: #5A3E2B;
        background-color: #FFF4E6;
    }

    /* Preview Avatar Styling */
    .avatar-preview {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #D35400;
        margin-bottom: 10px;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Edit Data User</h2>
        <p class="mb-0" style="color: #8B5E3C;">Form Perubahan Data Pengguna: <strong><?php echo e($data_user->name); ?></strong></p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('user.list')); ?>"
           class="btn btn-sm shadow-sm"
           style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px; padding: 10px 20px;">
           <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>

<div class="card card-custom card-body p-4 p-md-5">
    <h5 class="mb-4" style="color: #D35400; font-weight: 700;">
        <i class="fas fa-user-edit me-2"></i>Informasi Akun & Profil
    </h5>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px; background-color: #FDEDEC;">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="small fw-bold text-danger"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('user.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($data_user->id); ?>"/>

        <div class="row">
            
            <div class="col-md-12 mb-4">
                <label for="avatar">Foto Profil</label>
                <div class="d-flex align-items-center gap-3">
                    
                    <div class="flex-grow-1">
                        <input class="form-control border-light shadow-sm" id="avatar" type="file" name="avatar" style="border-radius: 8px; padding: 10px;">
                        <small class="text-muted mt-2 d-block">Gunakan foto formal dengan format JPG/PNG. Maksimal 2MB.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control border-light shadow-sm"
                       value="<?php echo e($data_user->name); ?>" required style="border-radius: 8px; padding: 12px;">
            </div>

            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control border-light shadow-sm"
                       value="<?php echo e($data_user->email); ?>" required style="border-radius: 8px; padding: 12px;">
            </div>

            <div class="col-md-6 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control border-light shadow-sm"
                       placeholder="********" style="border-radius: 8px; padding: 12px;">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="col-md-6 mb-3">
                <label for="role">Role</label>
                <select class="form-select border-light shadow-sm" id="role" name="role" required style="border-radius: 8px; padding: 12px;">
                    <option value="Super Admin" <?php echo e($data_user->role == 'Super Admin' ? 'selected' : ''); ?>>Super Admin</option>
                    <option value="Administrator" <?php echo e($data_user->role == 'Administrator' ? 'selected' : ''); ?>>Administrator</option>
                    <option value="Pelanggan" <?php echo e($data_user->role == 'Pelanggan' ? 'selected' : ''); ?>>Pelanggan</option>
                    <option value="Mitra" <?php echo e($data_user->role == 'Mitra' ? 'selected' : ''); ?>>Mitra</option>
                </select>
            </div>
        </div>

        <div class="mt-4 pt-4 border-top text-end">
            <button type="submit" class="btn text-white fw-bold shadow-sm"
                style="background: #D35400; border: none; padding: 12px 30px; border-radius: 10px;">
                <i class="fas fa-save me-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>