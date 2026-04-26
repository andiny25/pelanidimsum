<?php $__env->startSection('content'); ?>
<style>
    /* Styling Dasar Form */
    .form-control:focus, .form-select:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
    }

    /* Warna Label agar senada */
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
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                
                
            </ol>
        </nav>
        <h2 class="h4 fw-bold" style="color: #5A3E2B;">Edit Data Pelanggan</h2>
        <p class="mb-0" style="color: #8B5E3C;">Form Perubahan Data Pelanggan: <strong><?php echo e($dataPelanggan->first_name); ?> <?php echo e($dataPelanggan->last_name); ?></strong></p>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('pelanggan.list')); ?>"
           class="btn btn-sm shadow-sm"
           style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px; padding: 10px 20px;">
           <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>

<div class="card card-custom card-body p-4 p-md-5">
    <h5 class="mb-4" style="color: #D35400; font-weight: 700;">
        <i class="fas fa-user-edit me-2"></i>General Information
    </h5>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger border-0 shadow-sm" style="border-radius: 10px; background-color: #FDEDEC;">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="small fw-bold text-danger"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pelanggan.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="pelanggan_id" value="<?php echo e($dataPelanggan->pelanggan_id); ?>"/>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name">Nama Depan</label>
                <input class="form-control border-light shadow-sm" id="first_name" name="first_name" type="text"
                       value="<?php echo e($dataPelanggan->first_name); ?>" placeholder="First Name" required style="border-radius: 8px; padding: 12px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name">Nama Belakang</label>
                <input class="form-control border-light shadow-sm" id="last_name" name="last_name" type="text"
                       value="<?php echo e($dataPelanggan->last_name); ?>" placeholder="Last Name" required style="border-radius: 8px; padding: 12px;">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="birthday">Tanggal Lahir</label>
                <input class="form-control border-light shadow-sm" id="birthday" name="birthday" type="date"
                       value="<?php echo e($dataPelanggan->birthday); ?>" required style="border-radius: 8px; padding: 12px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender">Gender</label>
                <select class="form-select border-light shadow-sm" id="gender" name="gender" required style="border-radius: 8px; padding: 12px;">
                    <option value="" disabled>Pilih Gender</option>
                    <option value="Female" <?php echo e($dataPelanggan->gender == 'Female' ? 'selected' : ''); ?> >Female</option>
                    <option value="Male" <?php echo e($dataPelanggan->gender == 'Male' ? 'selected' : ''); ?> >Male</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input class="form-control border-light shadow-sm" id="email" type="email" name="email"
                       value="<?php echo e($dataPelanggan->email); ?>" placeholder="name@company.com" required style="border-radius: 8px; padding: 12px;">
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone">Nomor Telepon</label>
                <input class="form-control border-light shadow-sm" id="phone" name="phone" type="number"
                       value="<?php echo e($dataPelanggan->phone); ?>" placeholder="e.g. 0812345678" required style="border-radius: 8px; padding: 12px;">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/pelanggan/edit.blade.php ENDPATH**/ ?>