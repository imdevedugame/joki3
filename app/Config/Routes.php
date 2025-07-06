    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */

    // ===================== HOMEPAGE =====================
    $routes->get('/', 'Home::index');

    // ===================== AUTH ADMIN =====================
    $routes->group('admin', function ($routes) {
        $routes->get('login', 'Admin\Login::index');
        $routes->post('login/proses', 'Admin\Login::proses');
        $routes->get('logout', 'Admin\Login::logout');
    });
    $routes->get('register-member', function () {
        return redirect()->to('/member/register');
    });

    $routes->get('member/register', 'MemberAuthController::register');
    $routes->post('member/register-proses', 'MemberAuthController::registerProses');
    $routes->post('register-member-proses', 'MemberAuthController::registerProses');
    $routes->get('member/login', 'MemberAuthController::login');
    $routes->post('member/login-proses', 'MemberAuthController::loginProses');
    $routes->get('member/logout', 'MemberAuthController::logout');

    // ===================== AUTH MEMBER =====================
    // --- Login Member ---
    //$routes->get('member/login', 'MemberAuthController::login');
    //$routes->post('member/login-proses', 'MemberAuthController::loginProses');

    // --- Logout Member ---
    //$routes->get('member/logout', 'MemberAuthController::logout');

    // --- Register Member ---
    //$routes->get('member/register', 'MemberAuthController::register');
    //$routes->post('member/register-proses', 'MemberAuthController::registerProses');

    // --- Login Google Member ---
    $routes->get('login-google', 'MemberAuthController::loginGoogle');
    $routes->get('login-google-callback', 'MemberAuthController::loginGoogleCallback');

    // ===================== PAKET WISATA FRONTEND =====================
    $routes->get('paketwisata', 'PaketWisataController::index');
    $routes->get('paketwisata/pesan/(:num)', 'PaketWisataController::pesan/$1');
    $routes->get('paketwisata/konfirmasi/(:num)', 'PaketWisataController::konfirmasiPesan/$1');

    // ===================== CHECKOUT & PEMBAYARAN =====================
    $routes->get('paket_wisata/checkout/(:num)', 'PaketWisataController::checkout/$1');


    $routes->get('pembayaran/(:num)', 'PaketWisataController::pembayaran/$1');

    $routes->post('pembayaran/proses', 'PaketWisataController::prosesPembayaran');

    // ===================== RIWAYAT PESANAN =====================
    $routes->get('riwayat-pesanan', 'PaketWisataController::riwayatPesanan');


    // ===================== MEMBER FRONTEND =====================
    $routes->get('wisata', 'WisataMemberController::index');

    // ===================== DASHBOARD MEMBER =====================
    $routes->get('member/dashboard', 'MemberController::dashboard');

    // ===================== ADMIN DASHBOARD & ROUTES =====================
    $routes->group('admin', function ($routes) {

        // ---------- Dashboard ----------
        $routes->get('dashboard', 'Admin\DashboardController::index');

        // ---------- CRUD Paket Wisata ----------
        $routes->get('wisata', 'Admin\WisataController::index');
        $routes->get('wisata/tambah', 'Admin\WisataController::tambah');
        $routes->post('wisata/simpan', 'Admin\WisataController::simpan');
        $routes->get('wisata/edit/(:num)', 'Admin\WisataController::edit/$1');
        $routes->post('wisata/update/(:num)', 'Admin\WisataController::update/$1');
        $routes->get('wisata/hapus/(:num)', 'Admin\WisataController::hapus/$1');
        $routes->get('pemesanan/konfirmasi/(:num)', 'Admin\PemesananController::konfirmasi/$1');

        // ---------- Export PDF & Excel Paket Wisata ----------
        $routes->get('wisata/export-pdf', 'Admin\WisataController::exportPdf');
        $routes->get('wisata/export-excel', 'Admin\WisataController::exportExcel');

        // ---------- CRUD Gallery ----------
        $routes->get('gallery', 'Admin\GalleryController::index');
        $routes->get('gallery/tambah', 'Admin\GalleryController::tambah');
        $routes->post('gallery/simpan', 'Admin\GalleryController::simpan');
        $routes->get('gallery/edit/(:num)', 'Admin\GalleryController::edit/$1');
        $routes->post('gallery/update/(:num)', 'Admin\GalleryController::update/$1');
        $routes->get('gallery/hapus/(:num)', 'Admin\GalleryController::hapus/$1');

        // ---------- CRUD Video ----------
        $routes->get('video', 'Admin\VideoController::index');
        $routes->get('video/tambah', 'Admin\VideoController::tambah');
        $routes->post('video/simpan', 'Admin\VideoController::simpan');
        $routes->get('video/edit/(:num)', 'Admin\VideoController::edit/$1');
        $routes->post('video/update/(:num)', 'Admin\VideoController::update/$1');
        $routes->get('video/hapus/(:num)', 'Admin\VideoController::hapus/$1');

        // ---------- CRUD Berita ----------
        $routes->get('berita', 'Admin\BeritaController::index');
        $routes->get('berita/tambah', 'Admin\BeritaController::tambah');
        $routes->post('berita/simpan', 'Admin\BeritaController::simpan');
        $routes->get('berita/edit/(:num)', 'Admin\BeritaController::edit/$1');
        $routes->post('berita/update/(:num)', 'Admin\BeritaController::update/$1');
        $routes->get('berita/hapus/(:num)', 'Admin\BeritaController::hapus/$1');

        // ---------- Kontak ----------
        $routes->get('kontak', 'Admin\KontakController::index');
        $routes->get('kontak/hapus/(:num)', 'Admin\KontakController::hapus/$1');

        // ---------- Pemesanan ----------
        $routes->get('pemesanan', 'Admin\PemesananController::index');
        $routes->get('homestay/checkout', 'HomestayController::checkout');


        // ---------- Laporan ----------
        $routes->get('laporan', 'Admin\LaporanController::index');
        $routes->get('laporan/pdf', 'Admin\LaporanController::exportPdf');
        $routes->get('laporan/excel', 'Admin\LaporanController::exportExcel');

        // ---------- Homestay ----------
        $routes->get('homestay', 'Admin\HomestayController::index');
        $routes->get('homestay/create', 'Admin\HomestayController::create');
        $routes->post('homestay/store', 'Admin\HomestayController::store');
        $routes->get('homestay/edit/(:num)', 'Admin\HomestayController::edit/$1');
        $routes->post('homestay/update/(:num)', 'Admin\HomestayController::update/$1');
        $routes->get('homestay/delete/(:num)', 'Admin\HomestayController::delete/$1');


        // ---------- pemesanan homestay ----------
        $routes->get('pembayaranhomestay', 'Admin\PemesananHomestayController::index');
        $routes->get('pembayaranhomestay/konfirmasi/(:num)', 'Admin\PemesananHomestayController::konfirmasi/$1');
        $routes->get('pemesananhomestay', 'Admin\PemesananHomestayController::index');
        $routes->get('pemesananhomestay/konfirmasi/(:num)', 'Admin\PemesananHomestayController::konfirmasi/$1');
    });

    $routes->post('pesanan/simpanBukti', 'PesanController::simpanBukti');



    // ---------- gallery ----------
    $routes->get('gallery', 'GalleryController::index');


    // ---------- berita ----------
    $routes->get('berita/detail/(:num)', 'BeritaController::detail/$1');
    $routes->get('berita', 'BeritaController::index');

    // ---------- video ----------
    $routes->get('video', 'VideoController::index');

    // ---------- Homestay ----------
    $routes->get('checkout', 'PesanController::checkout');
    $routes->get('checkout-homestay', 'PesanController::checkoutHomestay');
    $routes->get('homestay/pesan/(:num)', 'HomestayController::pesan/$1');
    $routes->get('homestay', 'HomestayController::index');
    $routes->post('homestay/simpan-pesan', 'HomestayController::simpanPesan');
    $routes->post('homestay/simpan-pembayaran', 'HomestayController::simpanPembayaran');
    $routes->get('/homestay/checkout', 'HomestayController::checkout');
    $routes->get('/homestay/pembayaran/(:num)', 'HomestayController::pembayaran/$1');
    $routes->post('homestay/upload-bukti', 'PesanController::uploadBuktiBayarHomestay');
