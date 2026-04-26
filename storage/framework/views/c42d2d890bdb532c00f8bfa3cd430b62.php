<?php $__env->startSection('content'); ?>

<style>
    /* Mengubah warna border dan shadow saat input & select diklik (focus) */
    .form-control:focus,
    .form-select:focus {
        border-color: #D35400 !important;
        box-shadow: 0 0 0 0.25rem rgba(211, 84, 0, 0.25) !important;
        outline: none !important;
    }

    /* Membuat tampilan icon kalender dan input-group-text lebih senada */
    .input-group-text {
        background-color: #FFF4E6 !important;
        border-color: #ced4da;
        color: #D35400 !important;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                
                        
                        
                
            </ol>
        </nav>
        <h2 class="h4">Tambah Pelanggan</h2>
        <p class="mb-0">Form penambahan pelanggan baru</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('pelanggan.list')); ?>"
           class="btn btn-sm shadow-sm"
           style="background: #FFF4E6; color: #5A3E2B; border: 1px solid #5A3E2B; border-radius: 8px; padding: 10px 20px;">
           <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>

<div class="card card-body border-0 shadow mb-4">
    
    <h2 class="h5 mb-4" style="color: #d35400; font-weight: bold;">Informasi Akun</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pelanggan.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name" style="font-weight: 600;">Nama Depan</label>
                <input class="form-control shadow-sm" id="first_name" name="first_name" type="text" placeholder="Masukkan nama depan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name" style="font-weight: 600;">Nama Belakang</label>
                <input class="form-control shadow-sm" id="last_name" name="last_name" type="text" placeholder="Masukkan nama belakang" required>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <label for="birthday" style="font-weight: 600;">Tanggal Lahir</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </span>
                    <input class="form-control shadow-sm" id="birthday" name="birthday" type="date" required>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender" style="font-weight: 600;">Gender</label>
                <select class="form-select shadow-sm" id="gender" name="gender">
                    <option selected disabled>Pilih Gender</option>
                    <option value="Female">Perempuan</option>
                    <option value="Male">Laki-laki</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" style="font-weight: 600;">Email</label>
                <input class="form-control shadow-sm" id="email" type="email" name="email" placeholder="nama@email.com" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" style="font-weight: 600;">Nomor Telepon</label>
                <input class="form-control shadow-sm" id="phone" name="phone" type="text" placeholder="0812xxxx" required>
            </div>
        </div>

        <div class="mt-4 pt-4 border-top text-end">
            <button type="submit" class="btn text-white fw-bold shadow-sm"
                style="background: #D35400; border: none; padding: 12px 30px; border-radius: 10px;">
                <i class="fas fa-save me-2"></i> Simpan Pelanggan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/admin/pelanggan/create.blade.php ENDPATH**/ ?>