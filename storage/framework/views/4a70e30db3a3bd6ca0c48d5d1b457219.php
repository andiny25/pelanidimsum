<style>
    /* 1. Perbaikan Hover: Menghilangkan warna hitam bawaan template */
    #sidebarMenu .nav-link:hover {
        background-color: rgba(211, 84, 0, 0.1) !important; /* Oranye transparan halus */
        color: #D35400 !important; /* Teks jadi oranye pekat */
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
    }

    /* 2. Biar icon SVG ikut berubah warna saat di-hover */
    #sidebarMenu .nav-link:hover svg {
        stroke: #D35400 !important;
    }

    /* 3. Menjaga menu AKTIF agar tidak berubah saat di-hover */
    /* Kita seleksi link yang punya background oranye pekat (#D35400) */
    #sidebarMenu .nav-link[style*="background:#D35400"]:hover {
        background-color: #D35400 !important;
        color: white !important;
        opacity: 0.9; /* Efek tekan sedikit saja */
    }

    #sidebarMenu .nav-link[style*="background:#D35400"]:hover svg {
        stroke: white !important;
    }

    /* 4. Efek khusus tombol logout saat hover */
    .btn-logout-custom:hover {
        background-color: #b34700 !important; /* Oranye lebih gelap sedikit */
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(211, 84, 0, 0.3) !important;
    }
</style>

<nav id="sidebarMenu" class="sidebar d-lg-block collapse" data-simplebar style="background:#FFF4E6;">
    <div class="sidebar-inner px-3 pt-5 d-flex flex-column justify-content-between" style="height:100vh;">

        <div>
            <div class="text-center mb-4">
                <h4 class="fw-bold mb-0 mt-1" style="color:#D35400; font-size: 1.5rem;">Pelani</h4>
                <small class="fw-bold" style="color:#8B5E3C; letter-spacing: 1px;">Dimsum Mentai</small>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>"
                       class="nav-link d-flex align-items-center mb-2"
                       style="padding: 10px 15px; <?php echo e(request()->is('dashboard*') ? 'background:#D35400;color:white;border-radius:10px;box-shadow: 0 4px 6px rgba(211, 84, 0, 0.2);' : 'color:#5A3E2B;'); ?>">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v11a1 1 0 01-1 1h-6v-6H10v6H4a1 1 0 01-1-1V10z"/>
                        </svg>
                        <span class="fw-bold">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('user.list')); ?>"
                       class="nav-link d-flex align-items-center mb-2"
                       style="padding: 10px 15px; <?php echo e(request()->is('user*') ? 'background:#D35400;color:white;border-radius:10px;' : 'color:#5A3E2B;'); ?>">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="fw-bold">User</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('pelanggan.list')); ?>"
                       class="nav-link d-flex align-items-center mb-2"
                       style="padding: 10px 15px; <?php echo e(request()->is('pelanggan*') ? 'background:#D35400;color:white;border-radius:10px;' : 'color:#5A3E2B;'); ?>">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10 0v-6H7v6"/>
                        </svg>
                        <span class="fw-bold">Pelanggan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('produk.list')); ?>"
                       class="nav-link d-flex align-items-center mb-2"
                       style="padding: 10px 15px; <?php echo e(request()->is('produk*') ? 'background:#D35400;color:white;border-radius:10px;' : 'color:#5A3E2B;'); ?>">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v4H3V3zm0 7h18v11H3V10z"/>
                        </svg>
                        <span class="fw-bold">Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('kasir.index')); ?>"
                       class="nav-link d-flex align-items-center mb-2"
                       style="padding: 10px 15px; <?php echo e(request()->is('kasir*') ? 'background:#D35400;color:white;border-radius:10px;' : 'color:#5A3E2B;'); ?>">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M5 7v13h14V7M9 11h6M9 15h3"/>
                        </svg>
                        <span class="fw-bold">Kasir</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-2 pb-3">
            <a href="<?php echo e(route('auth.logout')); ?>"
               class="btn w-100 text-white fw-bold shadow-sm btn-logout-custom"
               style="background:#D35400; border:none; padding: 12px; border-radius: 10px; transition: all 0.3s;">
                <i class="fas fa-sign-out-alt me-1"></i> Logout
            </a>
        </div>

    </div>
</nav>
<?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>