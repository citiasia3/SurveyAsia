<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'Home::index', ['filter' => 'login']); //contoh single route filter
$routes->get('auth', 'Auth::index');
$routes->get('manage', 'Manage::index', ['filter' => 'permission:manage_survey']);
$routes->add('group/(:num)/users', 'Manage::usersInGroup/$1');

$routes->group('survey', ['filter' => 'login'], function ($routes) {
    //survey
    $routes->get('', 'Survey::index');
    $routes->get('all', 'Survey::dashboard');
    $routes->get('my', 'Survey::userSurvey');

    //join as creator
    $routes->get('join', 'Survey::joinCreator');
    $routes->post('join', 'Survey::attemptJoinCreator');

    //create survey
    $routes->post('create', 'Survey::tambahsurvey', ['filter' => 'permission:manage_survey']);

    //answer survey
    $routes->get('(:num)/questions', 'Survey::showQuestions/$1');
    $routes->post('answer', 'Survey::answerQuestions');

    //info survey
    $routes->get('(:num)/info', 'Survey::infoSurvey/$1');
});

/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'Auth::login', ['as' => 'login']);
    $routes->post('login', 'Auth::attemptLogin');
    $routes->get('logout', 'Auth::logout');

    // Registration
    $routes->get('register', 'Auth::register', ['as' => 'register']);
    $routes->post('register', 'Auth::attemptRegister');

    // Activation
    $routes->get('activate-account', 'Auth::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'Auth::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'Auth::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'Auth::attemptForgot');
    $routes->get('reset-password', 'Auth::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'Auth::attemptReset');
});
/* $routes->group('', ['filter' => 'login'], function($routes){
	$routes->get('dashboard','Home::dashboard');
}); */



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
