

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">Riwayat Transaksi</h4>
        <p class="text-muted small mb-0">Daftar semua transaksi</p>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <?php if($transaksi->count() > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>

                        
  <td>
    <?php $__currentLoopData = $item->detailTransaksi ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($detail->produk->name_produk ?? ''); ?> (x<?php echo e($detail->qty); ?>)<br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</td>

                        <td class="fw-bold text-warning">
                            Rp <?php echo e(number_format($item->total, 0, ',', '.')); ?>

                        </td>

                        <td>
                            <?php echo e($item->created_at->format('d M Y, H:i')); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>

            <div class="text-center py-5">
                <p class="text-muted">Belum ada transaksi</p>
            </div>

            <?php endif; ?>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pelanidimsum\resources\views/admin/transaksi/index.blade.php ENDPATH**/ ?>