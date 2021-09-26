<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// auth routes
$routes->group('',['filter'=>'AuthCheck'],function($routes){
    
    $routes->get('/', 'Home::index');

    /** Admins routes */  

    // dashboard routes
    $routes->get('/dashboard','Dashboard::index');
    $routes->get('/dashboard/profile','Dashboard::profile');

    // user routes
    $routes->get('/dashboard/users/','User::index');
    $routes->get('/dashboard/users/create','User::create');
    $routes->post('/dashboard/users/store','User::store');
    $routes->get('/dashboard/users/(:num)/edit','User::edit/$1');
    $routes->put('/dashboard/users/(:num)/update','User::update/$1');
    $routes->delete('/dashboard/users/(:num)/destroy','User::destroy/$1');
    $routes->get('/dashboard/users/(:num)/show','User::show/$1');

    
    // admins
    $routes->get('/dashboard/users/admins','Admin::index');
    $routes->get('/dashboard/users/admins/create','Admin::create');
    $routes->post('/dashboard/users/admins/store','Admin::store');
    $routes->get('/dashboard/users/admins/(:num)/edit', 'Admin::edit/$1');
    $routes->put('/dashboard/users/admins/(:num)/update','Admin::update/$1');
    $routes->delete('/dashboard/users/admins/(:num)/destroy','Admin::destroy/$1');


    // Test Routes
    $routes->get('/dashboard/tests','Test::index');
    $routes->get('/dashboard/tests/question/(:num)','Test::question/$1');
    $routes->get('/dashboard/tests/create','Test::create');
    $routes->post('/dashboard/tests/store','Test::store');
    $routes->get('/dashboard/tests/(:num)/edit','Test::edit/$1');
    $routes->put('/dashboard/tests/(:num)/update','Test::update/$1');
    $routes->delete('/dashboard/tests/(:num)/destroy','Test::destroy/$1');
    
   

    /** Fron End Routes */  

    // home page 
    $routes->get('home','Home::index');

    // // user quiz/test routes
    $routes->get('site/tests/(:num)/take','Site\Test::take/$1');
    $routes->post('site/tests/(:num)/check','Site\Test::check/$1');
    $routes->get('site/tests/(:num)/review/(:num)','Site\Test::review/$1/$2');
    
    $routes->get('site/users/profile','User::profile');
    $routes->get('site/(:any)','Home::index');


});

// guest routes
$routes->group('',['filter'=>'IfUserLoggedFilter'],function($routes){
    $routes->get('/auth','Auth::index');
    $routes->get('/auth/register','Auth::register');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
