<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #006400;">

    <!-- Sidebar - Brand -->
    <a href="<?= base_url('/'); ?>" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text">
            <i class="fas fa-home"></i>
            <?php if (in_groups('Admin')) : ?>
                Admin
            <?php elseif (in_groups('KABAG')) : ?>
                KABAG
            <?php elseif (in_groups('Tim Survei')) : ?>
                Tim Survei
            <?php endif; ?>
        </div>
    </a>


    <?php if (in_groups('Admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User Management
        </div>

        <!-- Nav Item - User List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Userlist'); ?>">
                <i class="fas fa-users"></i>
                <span>User List</span></a>
        </li>

        <!-- Nav Item - Add User -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Userlist/tambah_user'); ?>">
                <i class="fas fa-user-plus"></i>
                <span>Tambah User</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            My Profile
        </div>

        <!-- Nav Item - Profile -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Profile'); ?>">
                <i class="fas fa-user"></i>
                <span>Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                <span>Logout</span></a>
        </li>

    <?php elseif (in_groups('KABAG')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0 no-print">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Heading -->
        <div class="sidebar-heading no-print">
            My Profile
        </div>

        <!-- Nav Item - Profile -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Profile'); ?>">
                <i class="fas fa-user"></i>
                <span>Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Heading -->
        <div class="sidebar-heading no-print">
            Bantuan Kegiatan
        </div>

        <!-- Nav Item - Data Survei -->
        <li class="nav-item no-print">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-database"></i>
                <span>Data Survei</span>
            </a>
            <div id="collapseTwo" class="collapse no-print" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Status Survei</h6>
                    <a class="dropdown-item" href="<?= base_url('Survei/sudah_di_survei'); ?>">Selesai Disurvei</a>
                    <a class="dropdown-item" href="<?= base_url('Survei/belum_di_survei'); ?>">Tidak Disetujui</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Nav Item - Logout -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                <span>Logout</span></a>
        </li>

    <?php elseif (in_groups('Tim Survei')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Heading -->
        <div class="sidebar-heading no-print">
            My Profile
        </div>

        <!-- Nav Item - Profile -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Profile'); ?>">
                <i class="fas fa-user"></i>
                <span>Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Heading -->
        <div class="sidebar-heading no-print">
            Bantuan Kegiatan
        </div>

        <!-- Nav Item - Data Survei -->
        <li class="nav-item no-print">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-database"></i>
                <span>Data Survei</span>
            </a>
            <div id="collapseTwo" class="collapse no-print" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Status Survei</h6>
                    <a class="dropdown-item" href="<?= base_url('Survei/belum_di_survei'); ?>">Tidak Disetujui</a>
                    <a class="dropdown-item" href="<?= base_url('Survei/sudah_di_survei'); ?>">Selesai Disurvei</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Tambah Data Survei -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Survei/tambah_data/'); ?>">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Data Survei</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider no-print">

        <!-- Nav Item - Logout -->
        <li class="nav-item no-print">
            <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
                <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                <span>Logout</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>