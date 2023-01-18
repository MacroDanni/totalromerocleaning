<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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
$routes->get('/', 'Home::index');



//$routes->get('dashboard', 'dashboard::dashboard');
$routes->get('dashboard', 'worklist::worklist');
$routes->get('worklist', 'worklist::worklist');
$routes->get('worklistfinalizados', 'worklist::worklistfinalizados');
$routes->get('eliminartemp/(:num)', 'worklist::eliminartemp/$1');
$routes->get('eliminarworklist/(:num)', 'worklist::eliminarworklist/$1');
$routes->post('verfotos', 'worklist::verfotos');
$routes->get('fotosantes/(:num)', 'job::fotosantes/$1');

$routes->post('guardarfotosantes', 'job::guardarfotosantes');


$routes->get('calendarmanager', 'calendar::calendarmanager');


$routes->get('calendar', 'calendar::calendar');
$routes->get('employee', 'employee::employee');
$routes->post('guardarEditar', 'employee::guardareditar');
$routes->get('deleteEmployee/(:num)', 'employee::delete/$1');
$routes->post('guardaremployee', 'employee::guardaremployee');
$routes->get('editaremployee/(:num)', 'employee::editaremployee/$1');
$routes->get('altaemployee', 'employee::altaemployee');
$routes->get('guardareditar', 'worklist::guardareditar');
$routes->get('resetpassword/(:num)', 'employee::resetpassword/$1');



$routes->post('salvarcancelado', 'worklist::salvarcancelado');



$routes->get('building', 'building::building');
$routes->get('newBuilding', 'building::guardareditar');
$routes->post('savebuilding', 'building::savebuilding');
$routes->get('editarbuilding/(:num)', 'building::editarbuilding/$1');

$routes->post('guardarEditar/(:num)', 'building::guardarEditar/$1');



$routes->post('saveWorklist', 'worklist::saveWorklist');

$routes->post('session', 'Session::session');
$routes->post('savepasswordemployee', 'savepasswordemployee::savepassword');


$routes->get('contact', 'contact::contact');
$routes->get('job', 'job::job');



$routes->get('logout', 'Session::logout');


$routes->get('canceljob/(:num)', 'job::canceljob/$1');
$routes->get('acceptjob/(:num)', 'job::acceptjob/$1');
$routes->get('cleaningfinished/(:num)', 'job::cleanedup/$1');
$routes->get('startjob/(:num)', 'job::startclean/$1');
$routes->post('jobfinished', 'job::jobfinished');
$routes->post('cargafotos', 'job::cargafotos');
$routes->post('guardardescripcionfotos', 'job::guardardescripcionfotos');
$routes->get('trabajosfinalizado', 'job::trabajosfinalizado');


$routes->get('cleaningsupplyuser', 'cleaningsupplyuser::cleaningsupplyuser');
$routes->get('newcleaningsupplyuser', 'cleaningsupplyuser::newcleaningsupplyuser');
$routes->post('savecleaningsupply', 'cleaningsupply::savecleaningsupply');



$routes->post('solicitando', 'cleaningsupplyuser::solicitando');
$routes->get('cleaningsupply', 'cleaningsupply::cleaningsupply');
$routes->get('newcleaningsupply', 'cleaningsupply::newcleaningsupply');
$routes->get('editcleaningsupply/(:num)', 'cleaningsupply::editcleaningsupply/$1');
$routes->post('saveedit/(:num)', 'cleaningsupply::saveedit/$1');

/* Modulo de servicios*/

$routes->get('servicios','servicio::servicios');
$routes->get('crearservicio','servicio::crearservicio');
$routes->get('editarservicio/(:num)','servicio::editarservicio/$1');
$routes->post('guardareditarservicio','servicio::guardareditarservicio');
$routes->post('nuevoservicio','servicio::nuevoservicio');
$routes->get('eliminarserviciotemp/(:num)','servicio::eliminarserviciotemp/$1');
$routes->get('eliminarservicio/(:num)','servicio::eliminarservicio/$1');


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
