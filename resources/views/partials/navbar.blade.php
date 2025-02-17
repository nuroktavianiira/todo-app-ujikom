<div class="nav-item dropdown bg-primary ms-auto">
    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <!-- Foto Profil -->
        <img class="rounded-circle border border-3 border-primary shadow-sm" src="assets/img/potoiraaa.jpg"
            alt="User Avatar"
            style="width: 50px; height: 50px; object-fit: cover; transition: transform 0.3s ease-in-out;">
    </a>

    <!-- Dropdown Menu -->
    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 bg- animate__animated animate__fadeIn"
        aria-labelledby="userDropdown">
        <!-- Profil & Identitas -->
        <li class="px-5 py-3 text-center">
            <img class="rounded-circle shadow-sm mb-2" src="assets/img/potoiraaa.jpg" alt="User Avatar"
                style="width: 70px; height: 70px; object-fit: cover;">
            <p class="fw-bold text-light-emphasis mb-1 text-wihte">iranuroktaviani</p>
            <small class="text-white d-block">XII RPL </small>
            <small class="text-white d-block">📞 0812-3456-7890</small>
            <small class="text-white d-block">📧 iranurok@example.com</small>
            <a href="https://github.com/nuroktavianiira" class="d-block text-decoration-none text-light mt-1">
                <i class="fab fa-github"></i> github.com/iranuroktaviani
            </a>
        </li>
        <li>
            <hr class="dropdown-divider border-white">
        </li>

        <!-- Profil -->
        <li>
            <a class="dropdown-item d-flex align-items-center text-light" href="#">
                <i class="fas fa-user-circle me-2 text-primary"></i> Profil Saya
            </a>
        </li>

        <li>
            <hr class="dropdown-divider border-white">
        </li>

        <!-- Logout -->
        <li>
            <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                <i class="fas fa-sign-out-alt me-2"></i> Keluar
            </a>
        </li>
    </ul>
</div>

<!-- CSS -->
<style>
    /* Hover Efek untuk Foto Profil */
    .nav-link img:hover {
        transform: scale(1.1);
    }

    /* Animasi fade-in untuk dropdown */
    .dropdown-menu {
        animation-duration: 0.3s;
    }

    /* Warna dropdown dark mode */
    .dropdown-menu {
        background-color: #1e1e1e;
    }

    /* Warna item dropdown */
    .dropdown-item {
        font-size: 14px;
        padding: 8px 15px;
        color: #b0b0b0;
    }

    /* Hover efek pada dropdown item */
    .dropdown-item:hover {
        background-color: #292929;
        color: #ffffff;
    }
</style>
