<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pelani Dimsum - Sensasi Mentai Premium</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets-frontend/lib/lightbox/css/lightbox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets-frontend/lib/owlcarousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets-frontend/css/bootstrap.min.css')); ?>">

    <style>
        :root {
            --primary-orange: #FF6B3D;
            --footer-orange: #D35400;
            --dark-brown: #5A2D0C;
            --soft-white: #fcfcfc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--soft-white);
            scroll-behavior: smooth;
            padding-top: 140px;
        }

        /* Navigasi Styling */
        .navbar-light .navbar-nav .nav-link {
            font-weight: 600;
            color: var(--dark-brown);
            padding: 10px 20px;
            transition: 0.3s;
            position: relative;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link.active-custom {
            color: var(--primary-orange) !important;
        }

        /* Garis Bawah Navigasi Aktif */
        .navbar-light .navbar-nav .nav-link.active-custom::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 3px;
            background: var(--primary-orange);
            border-radius: 50px;
        }

        .fixed-top {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        /* --- FOOTER STYLING --- */
        .footer {
            background-color: var(--footer-orange) !important;
            color: white;
            border-radius: 25px 25px 0 0;
            margin-top: 25px;
            font-size: 0.95rem;
        }

        .footer h3 {
            font-size: 1.6rem;
            color: #ffffff !important;
            font-weight: 800;
        }

        .footer h5 {
            font-size: 1.1rem;
            color: #ffffff !important;
            font-weight: 700;
        }

        .footer .text-white-50 {
            color: rgba(255, 255, 255, 0.9) !important;
            line-height: 1.6;
        }

        .social-icon a {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 50%;
            margin-right: 6px;
            transition: 0.3s;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .social-icon a:hover {
            background: white;
            color: var(--footer-orange);
            transform: translateY(-2px);
        }

        .footer .quick-link {
            transition: 0.3s;
            padding-left: 0;
        }

        .footer .quick-link:hover {
            color: white !important;
            padding-left: 3px;
        }

        section {
            scroll-margin-top: 150px;
        }

        @media (max-width: 991.98px) {
            body {
                padding-top: 80px;
            }

            .navbar-light .navbar-nav .nav-link.active-custom::after {
                display: none;
            }

            .footer {
                border-radius: 20px 20px 0 0;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid fixed-top bg-white p-0">
        <div class="container-fluid d-none d-lg-block" style="background: var(--primary-orange);">
            <div class="container py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-white small">
                        <i class="fas fa-map-marker-alt me-2"></i> Jl. Lintas Timur, Terantang Manuk, Pkl. Kuras
                        <span class="mx-3">|</span>
                        <i class="fas fa-clock me-2"></i> Buka: 11:00 - 18:00 WIB
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <nav class="navbar navbar-expand-xl navbar-light bg-white py-3">
                <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
                    <h2 class="fw-bold m-0" style="color: var(--dark-brown);">Pelani<span
                            style="color: var(--primary-orange);">Dimsum</span></h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto" id="mainNavbar">
                        <a href="#home" class="nav-item nav-link active-custom">Home</a>
                        <a href="#about" class="nav-item nav-link">About Us</a>
                        <a href="#produk" class="nav-item nav-link">Menu</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="<?php echo e(route('login')); ?>" class="btn px-4 py-2 text-white shadow-sm"
                            style="background: var(--primary-orange); border-radius: 50px; font-weight: 600;">
                            <i class="fas fa-user-circle me-1"></i> Login
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <main id="home">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="container-fluid footer pt-4 pb-1">
        <div class="container py-4">
            <div class="row g-3 justify-content-between">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <h3 class="mb-3">Pelani Dimsum</h3>
                    <p class="text-white-50 mb-3">Pelopor dimsum mentai di Jl. Lintas Timur, Terantang Manuk, Pkl.
                        Kuras. Kami menyajikan kehangatan dan kelezatan di setiap gigitan.</p>
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <h5 class="mb-3">Quick Links</h5>
                    <div class="d-flex flex-column">
                        <a class="text-white-50 mb-1 text-decoration-none quick-link" href="#home"><i
                                class="fas fa-angle-right me-2"></i>Beranda</a>
                        <a class="text-white-50 mb-1 text-decoration-none quick-link" href="#about"><i
                                class="fas fa-angle-right me-2"></i>Tentang Kami</a>
                        <a class="text-white-50 mb-1 text-decoration-none quick-link" href="#produk"><i
                                class="fas fa-angle-right me-2"></i>Menu Populer</a>
                        <a class="text-white-50 mb-1 text-decoration-none quick-link" href="#contact"><i
                                class="fas fa-angle-right me-2"></i>Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-1 mb-lg-0">
                    <h5 class="mb-3">Workshop</h5>
                    <p class="text-white-50 mb-1"><i class="fas fa-map-marker-alt me-2"></i>Jl. Lintas Timur, Terantang
                        Manuk, Pkl. Kuras</p>
                    <p class="text-white-50 mb-1"><i class="fas fa-phone-alt me-2"></i>+62 812-3456-7890</p>
                    <p class="text-white-50 mb-0"><i class="fas fa-envelope me-2"></i>pelanidimsum@gmail.com</p>
                </div>
            </div>
            <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center text-white-50 small mt-0 pb-1">
                &copy; <?php echo e(date('Y')); ?> <strong>Pelani Dimsum</strong>. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('assets-frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/lib/easing/easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/lib/waypoints/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/lib/lightbox/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-frontend/js/main.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            const navLinks = $('#mainNavbar .nav-link');
            const sections = $('section[id]');

            // Klik
            navLinks.on('click', function() {
                navLinks.removeClass('active-custom');
                $(this).addClass('active-custom');
            });

            // Scroll
            $(window).on('scroll', function() {
                let scrollPos = $(document).scrollTop();

                sections.each(function() {
                    let target = $(this);
                    let id = target.attr('id');

                    let top = target.offset().top - 170;
                    let bottom = top + target.outerHeight();

                    if (scrollPos >= top && scrollPos <= bottom) {
                        navLinks.removeClass('active-custom');
                        $('#mainNavbar a[href="#' + id + '"]').addClass('active-custom');
                    }
                });
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\Users\ASUS\Downloads\pelanidimsum\pelanidimsum\resources\views/layouts/app.blade.php ENDPATH**/ ?>