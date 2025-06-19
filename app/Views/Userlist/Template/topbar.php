<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Jam -->
        <li class="nav-item">
            <span class="nav-link text-gray-600 small" id="current-time"></span>
        </li>
        <script src="<?= base_url(); ?>/login/js/jam.js"></script>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()['fullname']; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url(); ?>/login/img_profile/<?= user()['image']; ?>">
            </a>
        </li>
    </ul>
</nav>