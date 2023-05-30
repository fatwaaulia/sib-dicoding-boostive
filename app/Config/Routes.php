<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(
    function() {
        $data['title'] = '404';
        $data['content'] = view('errors/e404');
        return view('landingpage/header', $data);
    }
);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Landingpage::beranda');
$routes->get('produktif', 'Landingpage::produktif');
$routes->get('produktif/(:any)', 'Landingpage::detailTautanProduktif');
$routes->get('tentang-kami', 'Landingpage::tentangKami');

$routes->get('formulir-kontribusi', 'Kontribusi::new');
$routes->post('formulir-kontribusi/kirim', 'Kontribusi::create');
$routes->get('status-kontribusi', 'Kontribusi::statusKontribusi');

// == AUTENTIKASI ==
// Login
$routes->get('login', 'Auth::login');
$routes->post('login-process', 'Auth::loginProcess');
$routes->get('logout', 'Auth::logout');
// Lupa password
$routes->get('forgot-password', 'Auth::forgotPassword');
$routes->post('forgot-password-process', 'Auth::forgotPasswordProcess');
$routes->get('reset-password/(:any)', 'Auth::resetPassword/$1');
$routes->post('reset-password-process/(:any)', 'Auth::resetPasswordProcess/$1');
// Register
$routes->get('register', 'Auth::register');
$routes->post('register-process', 'Auth::registerProcess');
// Aktivasi akun
$routes->get('account-activation/(:any)', 'Auth::accountActivation/$1');
// Cek kirim email
$routes->get('send-email/(:any)/(:any)', 'Auth::sendEmail/$1/$2');
$routes->get('email-template', 'Auth::template');

// == Is login ==
$routes->get('dashboard', 'Dashboard::dashboard', ['filter' => 'Auth']);
$routes->group('profile', ['filter' => 'Auth'], static function ($routes) {
    $routes->get('/', 'Users::profile');
    $routes->post('update', 'Users::updateProfile');
    $routes->post('update/password', 'Users::updatePassword');
    $routes->post('delete/image', 'Users::deleteProfileImg');
});

// == Role - Superadmin ==
$routes->group('users', ['filter' => 'Superadmin'], static function ($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('edit/(:segment)', 'Users::edit/$1');
    $routes->post('update/(:segment)', 'Users::update/$1');
    $routes->post('delete/(:segment)', 'Users::delete/$1');
    $routes->post('delete-image/(:segment)', 'Users::deleteImg/$1');
});
$routes->group('pengajuan-kontribusi', ['filter' => 'Superadmin'], static function ($routes) {
    $routes->get('/', 'Kontribusi::index');
    $routes->post('update/(:segment)', 'Kontribusi::update/$1');
});
$routes->group('data-produktif', ['filter' => 'Superadmin'], static function ($routes) {
    $routes->get('/', 'Produktif::index');
    $routes->get('new', 'Produktif::new');
    $routes->post('create', 'Produktif::create');
    $routes->get('edit/(:segment)', 'Produktif::edit/$1');
    $routes->post('update/(:segment)', 'Produktif::update/$1');
    $routes->post('delete/(:segment)', 'Produktif::delete/$1');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
