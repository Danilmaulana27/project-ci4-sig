<!-- Favicons -->
<link href="<?= base_url('/assets/img/logo.png'); ?>" rel="icon" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/vendor/icofont/icofont.min.css">
<link rel="stylesheet" href="/assets/vendor/boxicons/css/boxicons.min.css">
<link rel="stylesheet" href="/assets/vendor/remixicon/remixicon.css">
<link rel="stylesheet" href="/assets/vendor/venobox/venobox.css">
<link rel="stylesheet" href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/vendor/aos/aos.css">

<!-- Template Main CSS File -->
<link rel="stylesheet" href="/assets/css/style.css">

<!-- Header -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center">
            <div class="logo mr-auto">
                <a href="/"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>
            <?= $this->include('Pages/Layout/navbar'); ?>
        </div>
    </div>
</header>
<!-- End Header -->

<?= $this->renderSection('content'); ?>

<!-- Footer -->
<footer id="footer">
    <div class="container d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                <strong><span>Copyright &copy; Danil Maulana Ependi <?= date('Y'); ?></span></strong>.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Vendor JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/vendor/counterup/counterup.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/venobox/venobox.min.js"></script>
<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-hover-dropdown.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/datatable-bootstrap.js"></script>